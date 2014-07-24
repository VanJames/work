$.get( '/web/api.php?methodPath=index' , {} , function( data ){
    var strHtml = '';
    for( var i = 0 ; i < data.menu.length ; i++ )
    {
        strHtml +=  '<li><a href="#"><b></b><span>' + data.menu[i].name + '</span></a>';
        if( data.menu[i].child instanceof Array
            ||
            data.menu[i].child instanceof Object
            )
        {
              strHtml += '<div class="submenu"><ul>';
              for( var j = 0 ; j < data.menu[i].child.length ; j++ )
              {
                   strHtml += '<li><a href="#"><span>' + data.menu[i].child[j].name + '</span><b></b></a></li>';
              }
              strHtml += '</ul></div></li>';
        }
    }
    $('#menu').html( strHtml );
} , 'json' );