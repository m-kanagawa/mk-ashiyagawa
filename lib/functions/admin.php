<?php
/*--------------------------------------------------------------------------
------------------------------- 管理画面の関数 -----------------------------
--------------------------------------------------------------------------*/


/* ダッシュボードトップ画面のカスタム
* ---------------------------------------- */

//ダッシュボードトップ画面のウィジェットを非表示
function example_remove_dashboard_widgets() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);   // 現在の状況（概要）
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);   // クイックドラフト
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);       // WordPressニュース
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);    // アクティビティ
	unset($wp_meta_boxes['dashboard']['normal']['core']['semperplugins-rss-feed']); // SEO 最新情報
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');

remove_action( 'welcome_panel', 'wp_welcome_panel' ); //WordPress へようこそ !

//管理画面上部のメニューを非表示
add_action( 'wp_before_admin_bar_render', 'my_wp_before_admin_bar_render' );
function my_wp_before_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo'); // wordpressロゴ
  //$wp_admin_bar->remove_menu('site-name'); // サイト名
  //$wp_admin_bar->remove_menu('updates'); // 更新
  $wp_admin_bar->remove_menu('comments'); // コメント
  $wp_admin_bar->remove_menu('new-content'); // 新規
  // $wp_admin_bar->remove_menu('my-account'); // マイアカウント
	//$wp_admin_bar->remove_menu('user-info');  // マイアカウント内「プロフィール」
	//$wp_admin_bar->remove_menu('edit-profile');  // マイアカウント内「プロフィールを編集」
}

//ログアウトを分りやすい所に表示
// function add_new_item_in_admin_bar() {
//  global $wp_admin_bar;
//  $wp_admin_bar->add_menu(array(
//  'id' => 'new_item_in_admin_bar',
//  'title' => __('ログアウト'),
//  'href' => wp_logout_url()
//  ));
//  }
// add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');


/* 管理者以外の設定
* ---------------------------------------- */

//管理者以外がログインした時のみ
if (!current_user_can('administrator')) {
  //アップグレード情報を非表示にする
  add_filter('pre_site_transient_update_core', create_function('$a', "return null;"));

  //管理画面のメニュー削除
  function remove_menu() {
      //remove_menu_page('index.php');                // ダッシュボード
      remove_menu_page('edit.php');                 // 投稿
      //remove_menu_page('upload.php');               // メディア
      remove_menu_page('link-manager.php');         // リンク
      //remove_menu_page('edit.php?post_type=page');  // 固定ページ
      remove_menu_page('edit-comments.php');        // コメント
      remove_menu_page('themes.php');               // 外観
      remove_menu_page('plugins.php');              // プラグイン
      remove_menu_page('users.php');                // ユーザー
      remove_menu_page('tools.php');                // ツール
      remove_menu_page('options-general.php');      // 設定
      remove_menu_page('profile.php'); // プロフィール(管理者以外のユーザー用)
  }
  add_action('admin_menu', 'remove_menu');


}

/* メニューの並び替え
* ---------------------------------------- */
function custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;

  return array(
		'index.php', // ダッシュボード
    'edit.php?post_type=news', // お知らせ
    'edit.php', // 投稿
    'edit.php?post_type=page', // 固定ページ
    'separator1', // 区切り線1
    'upload.php', // メディア
    'users.php', // ユーザー
    'separator2', // 区切り線2
    'themes.php', // テーマ
    'plugins.php', // プラグイン
    'tools.php', // ツール
    'options-general.php', // 設定
    'separator-last', // 区切り線3
    'link-manager.php', // リンク
    'edit-comments.php', // コメント
  );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


/* メディア挿入時のデフォルトのリンク先を「なし」に設定する
* ---------------------------------------- */
function set_image_link_type(){
  $image_set = get_option('image_default_link_type');
  if($image_set !== 'none'){
    update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', 'set_image_link_type', 10);


/* 管理画面にユーザー権限グループに応じた class を出力する
* ---------------------------------------- */
function add_user_role_class( $admin_body_class ) {
  global $current_user;
  if ( ! $admin_body_class ) {
      $admin_body_class .= ' ';
  }
  $admin_body_class .= ' role-' . urlencode( $current_user->roles[0] );
  return $admin_body_class;
}
add_filter( 'admin_body_class', 'add_user_role_class' );


/* ログイン画面のカスタム
* ---------------------------------------- */


//ロゴのリンク先を変更
function login_logo_url() {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'login_logo_url');

//ロゴのtitle属性を変更
function login_logo_title(){
    return get_bloginfo('name');
}
add_filter('login_headertitle','login_logo_title');

//「ログイン状態を保存する」を初期状態で選択済み
function login_checked_rememberme() { ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#rememberme').prop('checked', true);
    });
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'login_checked_rememberme' );

function login_user_pass_placeholder() { ?>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
  <script>
    $(document).ready(function(){
      $('#loginform label[for="user_login"], #loginform label[for="user_pass"]').contents().filter(function() {
        return this.nodeType === 3;
      }).remove();

      $('#loginform input[type="text"]').attr('placeholder', 'Username');
      $('#loginform input[type="password"]').attr('placeholder', 'Password');
    });
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'login_user_pass_placeholder' );

//ファビコン
// function my_favicon() {
// 	echo "\n".'<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="'.get_bloginfo('template_url').'/lib/img/share/favicon.ico" />'."\n";
//  }
//  add_action('wp_head', 'my_favicon');
//  //ファビコン //管理画面
//  function admin_favicon() {
// 	echo '<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="'.get_bloginfo('template_url').'/lib/img/share/favicon.ico" />'."\n";
//  }
//  add_action('admin_head', 'admin_favicon');

//WordPress5.4以降、デフォルトファビコンが「WPアイコン」になるのを無効
add_action( 'do_faviconico', 'wp_favicon_remover');
function wp_favicon_remover() {
	exit;
}