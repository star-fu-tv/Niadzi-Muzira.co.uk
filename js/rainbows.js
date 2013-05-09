$(window).load(function() {

  // Fade in
   $('body').each(function(i) {
      $(this).delay((i + 1) * 250).fadeIn(2000);
   });
})

$(document).ready(function() {

  // Start carousel
  $('.carousel').carousel(5);

  // Get each slide link and link to slide!
  $('.carousel-indicators li').click(function() {
    console.info("Nia clicked");
  });

  $("#car-nav-1").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(0);
  });

  $("#car-nav-2").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(1);
  });

  $("#car-nav-3").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(2);
  });

  $("#car-nav-4").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(3);
  });

  $("#car-nav-5").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(4);
  });      

  $("#car-nav-6").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(5);
  });      

  $("#car-nav-7").click(function(e) {
    e.preventDefault();
    $('.carousel').carousel(6);
  });      
  
  // Education tabs
  $('#education a:first').tab('show');

  console.info('Yah I workkk');
    // Count number of skills on page
    var skills = $('#skills-list').children();
    var numSkills = $('#skills-list').children().size();
    var prism;
    var colours = Array();

    // Create rainbow array
    prism = makeRainbow(.3,.3,.3,0,2,4,255,255,numSkills);

    // Transform 2 RGBA Colour Array
    for(var i = 0; i < numSkills; i++) {
      var hue = prism[i];
      var color = '';
      color = 'rgba(' + 
              Math.floor(hue[0]*127) + ',' + 
              Math.floor(hue[1]*127) + ',' + 
              Math.floor(hue[2]*127) + ',1)';
      colours[i] = color;
    }

    // Set Random Colours For Each Skill
    for(var i = 0; i < numSkills; i++) {
      var r = Math.random() * 20;
      $('#skills-list').children().eq(i).css('background-color',colours[r]);
    }

 function makeRainbow(frequency1, frequency2, frequency3,
                             phase1, phase2, phase3,
                             center, width, len)
  {
    var rainbow = [];
    if (len == undefined)      len = 50;
    if (center == undefined)   center = 128;
    if (width == undefined)    width = 127;

    for (var i = 0; i < len; ++i)
    {
       var red = (Math.sin(frequency1*i + phase1) * width + center) / 255;
       var grn = (Math.sin(frequency2*i + phase2) * width + center) / 255;
       var blu = (Math.sin(frequency3*i + phase3) * width + center) / 255;
       
        rainbow[i] = new Array();
        rainbow[i][0] = red;
        rainbow[i][1] = grn;
        rainbow[i][2] = blu;

    }

    return rainbow;
  };

});


