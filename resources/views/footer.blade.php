<!-- <footer class="footer" style="background-color: white">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a
          href="https://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
          class="mdi mdi-heart text-danger"></i></span>
    </div>
  </footer> -->
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>

<script>


</script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="assets/vendors/chart.js/chart.umd.js"></script>
<script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/proBanner.js"></script>

<!-- End custom js for this page-->
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="
https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js
"></script>
<script>
  $('.repeater').repeater({
    // (Optional)
    // start with an empty list of repeaters. Set your first (and only)
    // "data-repeater-item" with style="display:none;" and pass the
    // following configuration flag
    // initEmpty: true,
    // (Optional)
    // "defaultValues" sets the values of added items.  The keys of
    // defaultValues refer to the value of the input's name attribute.
    // If a default value is not specified for an input, then it will
    // have its value cleared.
    defaultValues: {
      'text-input': 'foo'
    },
    // (Optional)
    // "show" is called just after an item is added.  The item is hidden
    // at this point.  If a show callback is not given the item will
    // have $(this).show() called on it.
    show: function () {
      $(this).slideDown();
    },
    // (Optional)
    // "hide" is called when a user clicks on a data-repeater-delete
    // element.  The item is still visible.  "hide" is passed a function
    // as its first argument which will properly remove the item.
    // "hide" allows for a confirmation step, to send a delete request
    // to the server, etc.  If a hide callback is not given the item
    // will be deleted.
    hide: function (deleteElement) {
      // if(confirm('Are you sure you want to delete this element?')) {
      $(this).slideUp(deleteElement);
      // }
    },
    // (Optional)
    // You can use this if you need to manually re-index the list
    // for example if you are using a drag and drop library to reorder
    // list items
    // (Optional)
    // Removes the delete button from the first list item,
    // defaults to false.
    isFirstItemUndeletable: true
  });
</script>