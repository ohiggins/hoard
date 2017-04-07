    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> PRE-ALPHA
    </div>
    <strong>Powered by <a href="https://github.com/xadz/hoard">Hoard</a></strong>
  </footer>

  </div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">About Hoard</h4>
      </div>
      <div class="modal-body">
	      <p><strong>Version PRE-ALPHA</strong></p>
	      
	      <p>Hoard is a code snippet manager designed for teams. Develop faster and work more efficiently with your own library of useful code snippets and references.</p>
	      
	      <p><strong><small>&copy; Adam Greenough 2017.<br />
	      Licensed under the GNU General Public License v3.0.<br />
	      All rights reserved.</small></strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-github"></i> GitHub Repo</button>
        <button type="button" class="btn btn-warning"><i class="fa fa-link"></i> Visit Website</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/vendor/plugins/fastclick/fastclick.min.js"></script>
<script src="/vendor/plugins/select2/select2.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/js/app.min.js"></script>

<script src="/vendor/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script>
	$(".my-colorpicker1").colorpicker();
</script>

<script>
	$(document).ready(function () {    
    //Get CurrentUrl variable by combining origin with pathname, this ensures that any url appendings (e.g. ?RecordId=100) are removed from the URL
    var CurrentUrl = $(location).attr('href');
    //Check which menu item is 'active' and adjust apply 'active' class so the item gets highlighted in the menu
    //Loop over each <a> element of the NavMenu container
    $('.sidebar-menu li a').each(function(Key,Value)
        {
            //Check if the current url
            if(CurrentUrl.includes(Value['href']))
            {
	            console.log('true');
                //We have a match, add the 'active' class to the parent item (li element).
                $(Value).parent().addClass('active');
            }
        });
 });
 </script>
</body>
</html>