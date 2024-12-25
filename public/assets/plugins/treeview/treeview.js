$.fn.extend({
    treed: function (o) {

      var openedClass = 'si si-minus';
      var closedClass = 'si si-plus';

      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };

        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='si " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        tree.find('.branch i').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

$('#treeview1').treed();

$('#treeview2').treed();

$('#treeview3').treed();

$('#treeview4').treed();
$('#treeview5').treed();
$('#treeview6').treed();
$('#treeview7').treed();
$('#treeview8').treed();
$('#treeview9').treed();
$('#treeview10').treed();
$('#treeview11').treed();
$('#treeview12').treed();
$('#treeview13').treed();
$('#treeview14').treed();
$('#treeview15').treed();
$('#treeview16').treed();
$('#treeview17').treed();
$('#treeview18').treed();
$('#treeview19').treed();
$('#treeview20').treed();

$('#tree1').treed();

$('#tree2').treed({openedClass:'si si-folder-alt', closedClass:'si si-folder'});

$('#tree3').treed({openedClass:'si si-arrow-right', closedClass:'si si-arrow-down'});

$('#tree4').treed({openedClass:'si si-arrow-right', closedClass:'si si-arrow-down'});
