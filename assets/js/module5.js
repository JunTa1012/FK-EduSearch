$(document).ready(function() {
    // Function to sort the table by a specific column
    function sortTable(columnIndex) {
      var table = $('table');
      var rows = $('tbody tr', table).toArray();
  
      rows.sort(function(a, b) {
        var aValue = $('td', a).eq(columnIndex).text();
        var bValue = $('td', b).eq(columnIndex).text();
        
        // Compare the values based on their data type
        if ($.isNumeric(aValue) && $.isNumeric(bValue)) {
          return parseFloat(aValue) - parseFloat(bValue);
        } else {
          return aValue.localeCompare(bValue);
        }
      });
  
      $('tbody', table).empty().append(rows);
    }
  
    // Event handler for sorting when a table header is clicked
    $('th').click(function() {
      var columnIndex = $(this).index();
      sortTable(columnIndex);
    });

     // Event handler for searching the table based on user input
  $('#search').on('input', function() {
    var searchText = $(this).val().toLowerCase();

    $('tbody tr').each(function() {
      var rowText = $(this).text().toLowerCase();

      if (rowText.indexOf(searchText) > -1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
  
    // Event handler for filtering based on complaint type and status
    $('#filter, #filter-status').change(function() {
        var selectedType = $('#filter').val();
        var selectedStatus = $('#filter-status').val();

        $('tbody tr').hide();

        $('tbody tr').each(function() {
            var type = $(this).find('td:eq(0)').text();
            var status = $(this).find('td:eq(4) span').text();
      
            if ((selectedType === 'all' || type === selectedType) &&
                (selectedStatus === 'all' || status === selectedStatus)) {
              $(this).show();
            }
        });
    });
});



  