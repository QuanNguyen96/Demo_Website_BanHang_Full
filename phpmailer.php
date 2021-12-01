<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
<br>
<br>
    <br>
    <br>
    <h2>&nbsp;Điền form gửi mail</h2>
    <form enctype="multipart/form-data" id="form_sendmail">
        <table>
            <tr>
                <th>To Email Address :</th>
                <td><input type="email" name="senmail_email"></td>
            </tr>
            <tr>
                <th>Subject(tiêu đề) :</th>
                <td><input type="text" name="senmail_subject"></td>
            </tr>
            <tr>
                <th>message(nội dung tin) :</th>
                <td><textarea type="text" rows="10" style="width:170px" name="senmail_message" wrap="wrap"></textarea></td>
            </tr>
            <tr>
                <th>File đính kèm :</th>
                <td><input type="file" multiple="multiple" name="file_upload[]"></td>
            </tr>
        </table>
        <button type="submit" name="btn_sendmail">Send Mail</button>
    </form>
    <br>
    <br>
    <br>
    <script>
        $(document).ready(function(){
            // ham gui file upload qua ajax phai lay bang newformdata 
            // chu ko the gui nhan du lieu voi setlezlize()
            $('#form_sendmail').on('submit', function(e) {
                e.preventDefault();
                var dulieu=new FormData(this);
                dulieu.append('action','sendmail')
                $.ajax({
                    url:"ajax_sendmail.php",
                    method: "POST",
                    data: dulieu,
                    contentType:false,
                    processData:false,
                    success : function(data_Set)
                    {
                        alert(data_Set);
                    }
                });
            })



        })
    </script>
</body>

</html>