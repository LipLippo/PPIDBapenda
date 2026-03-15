$(document).ready(function() {
    
    $('.datatablejs').dataTable();

    $(document).on("click", ".logout", function(e) {
        var link = $(this).attr("href");
        e.preventDefault();
        bootbox.confirm("Keluar Menu Kepegawaian?", function(result) {
            if (result) {
                document.location.href = link;
            }
        });
    });

	$(window).resize(function() {
		// Breadcrumbs Responsive
        ellipses1 = $("#bc1 :nth-child(2)")
        if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}
    });

    //Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	

	// Bootstrap Tooltip
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	});

    jQuery(document).ready(function(){
          //Check to see if the window is top if not then display button
          jQuery(window).scroll(function(){
              if (jQuery(this).scrollTop() > 100) {
                  jQuery('.scrollTop').fadeIn();
              } else {
                  jQuery('.scrollTop').fadeOut();
              }
          });
          //Click event to scroll to top
          jQuery('.scrollTop').click(function(){
              jQuery('html, body').animate({scrollTop : 0},800);
              return false;
          });

      });

      $(document).ready(function(){
          $('#infoscroll').carouFredSel({
              responsive: true,
              circular: true,
              infinite: true,
              auto: true,
              width: '93%',
              height: 'auto',
              align: 'left',
              prev: '#prev',
              next: '#next',
              items: 1,
              mousewheel: true,
              scroll: {
                  pauseOnHover: true
              },
              swipe: {
                  onMouse: true,
                  onTouch: true
              }
          });

          $('#banner .banner-list').carouFredSel({
              auto: true,
              prev: '#banner-prev',
              next: '#banner-next',
              responsive: true,
              width: '100%',
              height: 95,
              scroll: 1,
              items: {
                  width: 95,
                  visible: {
                      min: 2,
                      max: 6
                  }
              },
              mousewheel: true,
              swipe: {
                  onMouse: true,
                  onTouch: true
              }
          });
      });

	// Full Calendar Demo
//	$('#kalender').fullCalendar({
//		defaultDate: '2016-05-12',
//		editable: true,
//		eventLimit: true, // allow "more" link when too many events
//		events: [
//			{
//				title: 'All Day Event',
//				start: '2016-05-01'
//			},
//			{
//				title: 'Long Event',
//				start: '2016-05-07',
//				end: '2016-05-10'
//			},
//			{
//				id: 999,
//				title: 'Repeating Event',
//				start: '2016-05-09T16:00:00'
//			},
//			{
//				id: 999,
//				title: 'Repeating Event',
//				start: '2016-05-16T16:00:00'
//			},
//			{
//				title: 'Conference',
//				start: '2016-05-11',
//				end: '2016-05-13'
//			},
//			{
//				title: 'Meeting',
//				start: '2016-05-12T10:30:00',
//				end: '2016-05-12T12:30:00'
//			},
//			{
//				title: 'Lunch',
//				start: '2016-05-12T12:00:00'
//			},
//			{
//				title: 'Meeting',
//				start: '2016-05-12T14:30:00'
//			},
//			{
//				title: 'Happy Hour',
//				start: '2016-05-12T17:30:00'
//			},
//			{
//				title: 'Dinner',
//				start: '2016-05-12T20:00:00'
//			},
//			{
//				title: 'Birthday Party',
//				start: '2016-05-13T07:00:00'
//			},
//			{
//				title: 'Click for Google',
//				url: 'http://google.com/',
//				start: '2016-05-28'
//			}
//		]
//	});
});