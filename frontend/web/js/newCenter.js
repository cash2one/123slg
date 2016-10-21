jQuery(document).ready(function () {
    if (jQuery('#picSlider') != null) {
        jQuery('#picSlider').smallslider();
    }
    
    $('#centerSvrList').Xtabs({hdcn:'svrttl',hdtagcur:'now',bdcn:'svrlist'});
    // //add username cookie
    // var cookies=document.cookie.split(';');
    // for(var i=0;i<cookies.length;i++){
    // 	if(cookies[i].split('=')[0].indexOf("ast_user")!=-1){
    // 		var username=cookies[i].split('=')[1];
    // 		$('input[name="username"]').val(decodeURIComponent(username));
    // 	}
    //
    // }
});

// function centerLoginGame(osPath,gameId,server){
// 	path = "login-game.action?gameId=" + gameId + "&server=" + server;
// 	window.open(path);
// }
//
// function quickLoginGame(gameId){
// 	path = "login-game.action?gameId=" + gameId;
// 	window.open(path);
// }
