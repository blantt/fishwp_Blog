<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.914/styles/kendo.common.min.css">
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.3.914/styles/kendo.default.min.css">

<!-- ---自定義js========= -->
<!-- 
  <script src="/js/ajax_functions.js"></script> -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- 引入 Kendo UI JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2021.3.914/js/kendo.all.min.js"></script>


<script>
  function initGrid() {


    var crudServiceBaseUrl = "../api/order_handler.ashx?func=";
    
    dataSource = new kendo.data.DataSource({
      autoSync: true,
      transport: {
        read: {
          type: "POST",
          url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
          dataType: "json",
          complete: function(e) {
            // alert('get2');
            // alert(e.responseText);

          }
        },

        update: {
          type: "POST",
          url: crudServiceBaseUrl + "setSingOrder",
          dataType: "json",
          complete: function(e) {
            if (e.responseText == "0") {
              dataSource.read();
              appSingOrderNO();

            } else {
              showModal("儲存失敗" + e.responseText, "錯誤", "error");
            }
          }
        },
        parameterMap: function(options, operation) {
          if (operation == "read") {

            return {
              action: 'my_custom_action',
              //func: 'approveOrder',
              func: 'test2',
              OrderID: '999',

            }
          } else {
            return {
              models: kendo.stringify(options.models)
            };
          }



        }
      },

      batch: true,
      pageSize: 10,
      schema: {
        model: {
          id: "title",
          fields: {
            title: { type: "title", editable: false },
            content: { type: "content", editable: false },

          }
        }
      }
    });


    //設定 Kendo UI 的 Grid
    var grid = $("#Grid").kendoGrid({
      dataSource: dataSource, //資料來源
      //pageable: true,
      resizable: true,
      //scrollable: true,
      reorderable: true,
      //change: onChange,
      //editable: { mode: "inline", destroy: true, confirmation: "是否確定要刪除此筆紀錄？" },
      sortable: true,
      //autoBind: true,

      navigatable: false,
      pageable: true,
      height: 550,
      toolbar: [],
      editable: false,
      columns: [{
          field: "title",
          title: "title",
          width: "180px"
        },
        {
          field: "content",
          title: "content",
          width: "180px"
        },

      ],
      dataBound: function(e) {



      }


    });
  }

  function abc() {
    fetch('http://localhost/fish2/wp-json/wp/v2/note/')
      .then(response => {
        alert('get it');
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        console.log(data); // 將API回應的JSON資料輸出到控制台
      })
      .catch(error => {
        console.error('There was a problem with your fetch operation:', error);
      });
  }

  function abc2() {

    $.ajax({
      type: 'POST',
      url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
      data: {
        'action': 'my_custom_action',
        'func': 'test2',
        'OrderID': '999',
      },
      success: function(response) {

        var cleanedStr = response.replace(/\n/g, ''); // 去除斷行字符
        alert(cleanedStr);
        if (cleanedStr == "0") {
          // 處理成功響應

          alert('success2');
          //showMessage("訂單已審核", "success");
        } else {
          // 處理失敗響應
          alert('danger,' + response);
          //  showMessage(response, "danger");
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        // 處理請求錯誤
        alert('danger2');
        //  showMessage("審核失敗！" + xhr.responseText, "danger");
      },
    });

  }

  function testcall2() {

    $.ajax({
      type: 'POST',
      url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
      data: {
        'action': 'my_custom_action',
        'func': 'approveOrder',
        'OrderID': '999',
      },
      success: function(response) {

        var cleanedStr = response.replace(/\n/g, ''); // 去除斷行字符
        if (cleanedStr == "0") {
          // 處理成功響應

          alert('success');
          //showMessage("訂單已審核", "success");
        } else {
          // 處理失敗響應
          alert('danger,' + response);
          //  showMessage(response, "danger");
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        // 處理請求錯誤
        alert('danger2');
        //  showMessage("審核失敗！" + xhr.responseText, "danger");
      },
    });

  }


  $(document).ready(function() {
    //alert('beginReady');
    initGrid();
    // alert('endReady');
  });
</script>

<?php
 
pageBanner2();
?>
 <!-- #endregion -->
<div id="Grid"></div>
<div class="row">
  <div class="col-md-4">
    <input id="Button1" onclick="testcall2()" type="button" value="讀取測試1" />
  </div>
  <div class="col-md-4">
    <input id="Button1" onclick="abc2()" type="button" value="讀取測試2" />
  </div>
  <div class="col-md-4">
    cc2
  </div>
</div>

<?php
 
?>