<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Article;
use App\Models\Page;

use Validator;
use Illuminate\Support\Facades\Mail;

class Homepage extends Controller
{

    public function __construct()
    {
        view()->share('pages',Page::orderBy('order','ASC')->get());
        view()->share('categories',Category::inRandomOrder()->get());
    }

    public function index(){
        $data['articles']=Article::orderBy('created_at','DESC')->paginate(2);
        $data['articles']->withpath(url('sayfa'));
        return view('front.homepage',$data);
    }

    public function single($category,$slug){
        $category=Category::whereSlug($category)->first() ?? abort(403,'Böyle bir kategori bulunamadı.');
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'Böyle bir yazı bulunamadı.');
        $article->increment('hit');
        $data['article']=$article;
        return view('front.single', $data);
    }

    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(403,'Boyle bir kategori bulunamadi');
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        return view('front.category',$data);
    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403,'Boyle bir sayfa bulunamadi.');
        $data['page']=$page;
        return view('front.page',$data);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactPost(Request $request){
        $rules = [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'
        ];
        $validate = Validator::make($request->post(),$rules);

        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }
        Mail::send([],[], function($message) use($request){
            $message->from('kadirtaban08@gmail.com','Blog Sitesi');
            $message->to('kadirtaban08@gmail.com');
            $message->setBody(' Mesajı Gönderen :'.$request->name.'<br />
                    Mesajı Gönderen Mail :'.$request->email.'<br />
                    Mesaj Konusu : '.$request->topic.'<br />
                    Mesaj :'.$request->message.'<br /><br />
                    Mesaj Gönderilme Tarihi : '.now().'','text/html');
            $message->subject($request->name. ' iletişimden mesaj gönderdi!');
        });

        //$contact = new Contact;
        //$contact->name = $request->name;
        //$contact->email = $request->email;
        //$contact->topic = $request->topic;
        //$contact->message = $request->message;
        //$contact->save();
        return redirect()->route('contact')->with('success','Mesajiniz bize iletildi, tesekkur ederiz!');
    }

    public function storemessage(Request $request){
        $rules = [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'
        ];
        $validate = Validator::make($request->post(),$rules);

        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->topic = $request->input('topic');
        $data->message = $request->input('message');
        $data->save();
        echo "Store message";
        return redirect()->route('contact')->with('success','Mesajiniz bize iletildi, tesekkur ederiz!');
    }
}
