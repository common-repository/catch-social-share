function pinItt()
{
  var e = document.createElement('script');
  e.setAttribute('type','text/javascript');
  e.setAttribute('charset','UTF-8');
  e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);
  document.body.appendChild(e);
}