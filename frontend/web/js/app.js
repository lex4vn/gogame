/**
 *  @author Eugene Terentev <eugene@terentev.net>
 */
$( document ).ready(function() {
    var game_ads_col = 120;
    console.log( "ready!" );
    var gameHolder = $('#game-holder').width();
    var gameObject = $('.game-object').width();
    
    console.log(gameHolder);
    console.log(gameObject);
    
    // Khi width game > width holder
    if(gameObject >= gameHolder){
         console.log('game qua lớn');
    } else {
        var widthRedund = gameHolder - gameObject;
        // Nếu game quá bé, cho vao chính giữa, 2 quảng cáo sát 2 bên
        if(widthRedund >= game_ads_col * 2){
            console.log('game qua bé');   
            $('.game-center').css('float','left');
            $('.ads-right').css('float','left');
            $('.ads-left').css('float','left');
            $('.ads-right').show();
            $('.ads-left').show();
        }else if(widthRedund >= game_ads_col){
            // Game sát trái và hiển thị 1 quảng cáo phải
             console.log('game bên trái, quảng cáo bên phải');     
             //ads-right
             $('.game-center').css('float','left');
             $('.ads-right').css('float','left');
             $('.ads-right').show();
        }else{
            // Game căn giữa 2 bên để màu đen
            console.log('game căn giữa');   
            $('.game-center').css('text-align','center');
        }
        
    }

    
});