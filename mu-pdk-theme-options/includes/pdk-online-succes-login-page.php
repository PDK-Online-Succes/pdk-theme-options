<?php
/* Start Adding Functions Below this Line */

function pdk_custom_login_css() {?>
    <style type='text/css'>
	body.login { background-image: url("/wp-content/mu-plugins/mu-pdk-theme-options/assets/images/login_background.png"); background-size:cover; }
	body.login h1 a { background-image: none, url( "/wp-content/mu-plugins/mu-pdk-theme-options/assets/images/Logo-PDK-online-succes.svg"); background-size: contain; width: auto; }
	/* #login { position: relative; top: 50%; transform: translateY(-50%); padding-top: 0; } */
	#login { padding: 10% 0 0; }
	#login form { border-color: #d65c00; }
	#login .wp-hide-pw { color: #444; }
	#login #nav, #login #backtoblog { display: inline-block; padding:10px 0; margin: 0 10px; }

	input[type="checkbox"]:focus, input[type="color"]:focus, input[type="date"]:focus, input[type="datetime-local"]:focus, input[type="datetime"]:focus, input[type="email"]:focus, input[type="month"]:focus, input[type="number"]:focus, input[type="password"]:focus, input[type="radio"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="text"]:focus, input[type="time"]:focus, input[type="url"]:focus, input[type="week"]:focus, select:focus, textarea:focus, .login .button.wp-hide-pw:focus { border-color: #d65c00; box-shadow: 0 0 0 1px #d65c00; }
	input[type="checkbox"]:checked::before { content: url("data:image/svg+xml;utf8,<svg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27><path%20d%3D%27M14.83%204.89l1.34.94-5.81%208.38H9.02L5.78%209.67l1.34-1.25%202.57%202.4z%27%20fill%3D%27%23d65c00%27%2F><%2Fsvg>");	}
	@media screen and (max-height:550px) {
		#login { top: unset; transform: translateY(0); }
	}
	</style>
<?php }
add_action('login_head', 'pdk_custom_login_css');

function pdk_custom_login_logo_url($url) {
     return 'https://pdk.nl';
}
add_filter( 'login_headerurl', 'pdk_custom_login_logo_url' );

function pdk_login_logo_url_title() {
    return 'Mogelijk gemaakt door PDK Online Succes';
}
add_filter( 'login_headertitle', 'pdk_login_logo_url_title' );

/* Stop Adding Functions Below this Line */
?>
