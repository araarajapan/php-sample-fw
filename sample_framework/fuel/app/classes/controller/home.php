<?php
class Controller_Home extends Controller
{
  public function action_index() //表示するveiwのphpファイル(今回はview直下のindex.php)/home(thisファイル)/index(メソッド名) で呼び出す
  {
    //==============================
    //上記はサンプル　配列としてテキストをビューファイルへ渡している
    // $data = array();
    // $data['username'] = 'Joe14';
    // $data['title'] = 'Home';
    //このキー名をview側で変数名 $username $titleとして使える
    //ビューへ変数と値を渡す
    // return View::forge('home/index', $data);
    // home/indexとすればviewフォルダ内直下のhomeフォルダ内のindex.phpというビューという意味になる

    //return View::forge('index', $data);//URLを変えずに別のビューを映し出すことができる
    // viewフォルダ内直下のindex.phpというビューに値を渡すという意味になる
    //==============================

    //コントローラーから変数の形式でビューを割り当てる 
    // 以下はオブジェクトを渡すパターン

    $view = View::forge('template/index'); //テンプレートとなるビューファイルの読み込み
    //View::forgeでviewファイルを指定
    $view->set('head', View::forge('template/head'));
    //setメソッドを使うことで変数に割り当てるviewを指定できる
    $view->set('content', View::forge('home/content'));
    $view->set('footer', View::forge('template/footer'));
    // $view->set_global('site_title', WEBsite);
    $view->set_global('username', 'usernamedesu');
    //テンプレートビューの中でさらに読み込んだビューの中にある変数へ値を渡したい場合はset_globalを使う。
    //上記だと templateはindex.php　その中で呼び出されている3つのビューファイルの中で変数が使われてる　そこに渡したい content.phpのusernameという変数を作成して渡す
    //テンプレートビューの中で使う変数へ値を渡すだけならsetでいい。

    //レンダリングした HTML をリクエストに返す
    return $view;

    //==============================
    // public function action_index(){
    //   $data = array();//変数を作る
    //   $data['name'] = 'きむりおん';//配列を作成
    //   return Response::forge(View::forge('welcome/test',$data));//値を渡す場合 Responseクラスのforgeメソッドを使う
    //   引数にViewクラスのインスタンスを作って引数として設定 第二引数に配列として作った変数を渡す

    // 「〜::forge」はオブジェクトを生成するメソッド。
    // Response::forgeでresponse オブジェクトを生成してる。（ブラウザへ返すレスポンスのこと）
    // responseオブジェクトを生成するときにViewオブジェクトのインスタンスを渡してる。
    // View::forgeの中の第一引数でビューファイルを指定。今回だとviews/welcomeフォルダ内のビューファイルtest.phpを指定してる
    // 第二引数では、指定したビューファイルへ渡す値を指定してる。（配列で渡す）
    // }

    //views/welcome/test.php
    //     <html>
    //   <head>
    //     <title>ビューのテスト</title>
    //     <body>
    //       <?php echo $name; //コントローラーから渡された配列のインデックス名を変数として指定するだけでその値が使える

    //コントローラからビューへの値の受け渡し方 2つある
    //①引数で渡す
    //   public function action_test(){
    //     $data = array();
    //     $data['title'] = 'テストです。';
    //     $data['body'] = '内容です。';
    //     return view::forge('test',$data); //第２引数に渡したい変数を指定する
    // }

    //②オブジェクトを生成して渡す
    //   public function action_test(){
    //     $view = View::forge('test'); //viewオブジェクトを生成する。この時、引数に表示したいビューファイルを指定

    //         ビューファイル内にある変数へ値を渡したい場合はsetを使う
    //         第一引数に変数名、第二引数に値を指定する
    //     $view->set('title','テストです。'); 
    //     $view->set('body','内容です。');

    //     return $view;
    // }
    //==============================
  }
}
