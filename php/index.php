<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script type="text/javascript">
  var ptf = navigator.platform;
  var cc = navigator.hardwareConcurrency;
  var ram = navigator.deviceMemory;
  var ver = navigator.userAgent;
  var str = ver;
  var os = ver;
  //gpu
  var canvas = document.createElement('canvas');
  var gl;
  var debugInfo;
  var ven;
  var ren;
  //sysinfo
  console.log(ver);
  console.log(ptf);
  console.log(cc);
  console.log(ram);
  //browser
  if (ver.indexOf('Firefox') != -1)
  {
    str = str.substring(str.indexOf(' Firefox/') + 1);
    str = str.split(' ');
    brw = str[0];
    console.log(str[0]);
  }
  else if (ver.indexOf('Chrome') != -1)
  {
    str = str.substring(str.indexOf(' Chrome/') + 1);
    str = str.split(' ');
    brw = str[0];
    console.log(str[0]);
  }
  else if (ver.indexOf('Safari') != -1)
  {
    str = str.substring(str.indexOf(' Safari/') + 1);
    str = str.split(' ');
    brw = str[0];
    console.log(str[0]);
  }
  else if (ver.indexOf('Edge') != -1)
  {
    str = str.substring(str.indexOf(' Edge/') + 1);
    str = str.split(' ');
    brw = str[0];
    console.log(str[0]);
  }
  else
  {
    brw = 'Not Available'
  }
  //ram
  if (ram == undefined)
  {
    ram = 'Not Available';
  }
  //gpu
  try
  {
    gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
  }
  catch (e) {}
  if (gl)
  {
    debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
    ven = gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL);
    ren = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);
  }
  console.log(ven);
  console.log(ren);
  //
  var ht = window.screen.height
  var wd = window.screen.width
  console.log(window.screen.height)
  console.log(window.screen.width)
  //os
  os = os.substring(0, os.indexOf(')'));
  os = os.split(';');
  os = os[1];
  os = os.trim();
  console.log(os);


  $.ajax({
    type: 'POST',
    url: '/php/index.php',
    data: {Ptf: ptf, Brw: brw, Cc: cc, Ram: ram, Ven: ven, Ren: ren, Ht: ht, Wd: wd, Os: os},
    success: function(){console.log('Got Device Information');},
    dataType: 'text'
  });

</script>
