@extends('layouts.app')


@section('content')

 
<table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
  <thead class="bg-table">
    <tr>
      <th class="sort">Plant ID</th>
      <th class="sort">Vector</th>
      <th class="sort">Genes targeted</th>
      <th class="sort">Sibling plants</th>
    </tr>
  </thead>
  <tbody class="bg-white">                  
    <tr>
      <td>Data</td>
      <td>Data</td>
      <td>Data2</td>
      <td>Data</td>
    </tr>
  </tbody>
  <tfoot class="bg-table">
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    <tr>
      <th>Plant ID</th>
      <th>Vector</th>
      <th>Genes targeted</th>
      <th>Sibling plants</th>
    </tr>
    
  </tfoot>
</table>     
 
    </div>
  </body>
</html>
 


 
 <script  src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script  src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    setTimeout(function(){
      $('table').DataTable({
        rowReorder: {
          selector: 'td:nth-child(2)'
      },
      responsive: true
    });
      }, 500);
} );
</script>
@endsection 