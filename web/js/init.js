$.get( '/web/api.php?methodPath=index' , {} , function( data ){
    var strHtml = '';
    for( var i = 0 ; i < data.menu.length ; i++ )
    {
        strHtml +=  '<li><a href="#!/page_HOME"><b></b><span>' + data.menu[i].name + '</span></a></li>';
    }
    $('#menu').html( strHtml );
} , 'json' );