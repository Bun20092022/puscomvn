        <script type="text/javascript">
           function ChangeToSlug()
        {
            var title, slug;
         
            //Lấy text từ thẻ input title 
            title = document.getElementById("title").value;
         
            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();
         
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
        </script>
<script type="text/javascript">
      function BrowseServer()
      {
        var finder = new CKFinder();
        finder.basePath = '../';
        finder.selectActionFunction = SetFileField;
        finder.popup();
      }
      function SetFileField( fileUrl )
      {
        document.getElementById( 'xFilePath' ).value = fileUrl;
      }
      function BrowseServer1()
          {
            var finder = new CKFinder();
            finder.basePath = '../';
            finder.selectActionFunction = SetFileField1;
            finder.popup();
          }
        function SetFileField1( fileUrl )
          {
            document.getElementById( 'xFilePath1' ).value = fileUrl;
          }
      function BrowseServer2()
          {
            var finder = new CKFinder();
            finder.basePath = '../';
            finder.selectActionFunction = SetFileField2;
            finder.popup();
          }
        function SetFileField2( fileUrl )
          {
            document.getElementById( 'xFilePath2' ).value = fileUrl;
          }
      function BrowseServer3()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField3;
                  finder.popup();
               }
            function SetFileField3( fileUrl )
               {
                  document.getElementById( 'xFilePath3' ).value = fileUrl;
               }
      function BrowseServer4()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField4;
                  finder.popup();
               }
            function SetFileField4( fileUrl )
               {
                  document.getElementById( 'xFilePath4' ).value = fileUrl;
               }
      function BrowseServer5()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField5;
                  finder.popup();
               }
            function SetFileField5( fileUrl )
               {
                  document.getElementById( 'xFilePath5' ).value = fileUrl;
               }
         function BrowseServer6()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField6;
                  finder.popup();
               }
            function SetFileField6( fileUrl )
               {
                  document.getElementById( 'xFilePath6' ).value = fileUrl;
          }
          function BrowseServer7()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField7;
                  finder.popup();
               }
            function SetFileField7( fileUrl )
               {
                  document.getElementById( 'xFilePath7' ).value = fileUrl;
          }
          function BrowseServer8()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField8;
                  finder.popup();
               }
            function SetFileField8( fileUrl )
               {
                  document.getElementById( 'xFilePath8' ).value = fileUrl;
          }
          function BrowseServer9()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField9;
                  finder.popup();
               }
            function SetFileField9( fileUrl )
               {
                  document.getElementById( 'xFilePath9' ).value = fileUrl;
          }
          function BrowseServer10()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField10;
                  finder.popup();
               }
            function SetFileField10( fileUrl )
               {
                  document.getElementById( 'xFilePath10' ).value = fileUrl;
          }
          function BrowseServer11()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField11;
                  finder.popup();
               }
            function SetFileField11( fileUrl )
               {
                  document.getElementById( 'xFilePath11' ).value = fileUrl;
          }
          function BrowseServer12()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField12;
                  finder.popup();
               }
            function SetFileField12( fileUrl )
               {
                  document.getElementById( 'xFilePath12' ).value = fileUrl;
          }
          function BrowseServer13()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField13;
                  finder.popup();
               }
            function SetFileField13( fileUrl )
               {
                  document.getElementById( 'xFilePath13' ).value = fileUrl;
          }
          function BrowseServer14()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField14;
                  finder.popup();
               }
            function SetFileField14( fileUrl )
               {
                  document.getElementById( 'xFilePath14' ).value = fileUrl;
          }
          function BrowseServer15()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField15;
                  finder.popup();
               }
            function SetFileField15( fileUrl )
               {
                  document.getElementById( 'xFilePath15' ).value = fileUrl;
          }
          function BrowseServer16()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField6;
                  finder.popup();
               }
            function SetFileField16( fileUrl )
               {
                  document.getElementById( 'xFilePath6' ).value = fileUrl;
          }
          function BrowseServer17()
               {
                  var finder = new CKFinder();
                  finder.basePath = '../';
                  finder.selectActionFunction = SetFileField17;
                  finder.popup();
               }
            function SetFileField17( fileUrl )
               {
                  document.getElementById( 'xFilePath17' ).value = fileUrl;
          }
      </script>  