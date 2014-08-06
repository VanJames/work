//$.get( '/web/api.php?methodPath=index' , {} , function( data ){
//    var strHtml = '';
//    for( var i = 0 ; i < data.menu.length ; i++ )
//    {
//        strHtml +=  '<li><a href="#"><b></b><span>' + data.menu[i].name + '</span></a>';
//        if( data.menu[i].child instanceof Array
//            ||
//            data.menu[i].child instanceof Object
//            )
//        {
//              strHtml += '<div class="submenu"><ul>';
//              for( var j = 0 ; j < data.menu[i].child.length ; j++ )
//              {
//                   strHtml += '<li><a href="#"><span>' + data.menu[i].child[j].name + '</span><b></b></a></li>';
//              }
//              strHtml += '</ul></div></li>';
//        }
//    }
//    $('#menu').html( strHtml );
//} , 'json' );
var initArray = [];
var initTime = 1;
$('#menu').find('li').find('a').live('click',function(){
    var id = $(this).attr('data-id');
    checkAndBind(id);
    location.href=$(this).attr('data-href');
});
function bind(id){
    $('#'+id).find('.box').append('<p>123</p>');
}

function checkAndBind(id)
{
    initTime++;
    console.log(initTime);
    if(initTime >= 24 )
    {
        location.reload();
        return ;
    }
    if($.inArray(id,initArray) != -1 )
    {
        return;
    }
    initArray.push(id);
    bind(id);
}