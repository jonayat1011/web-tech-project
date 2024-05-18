
<?php 

include("PrevHeader.php");
?>
<html>
    <head>
        
        <title>Create New Account</title>
        <script src="..\controller\Reg.js"></script>
        <style>
                      fieldset{
                background-color:#99ddff;
                width:30%;
                margin: 100 550;
            }  
    input[type=submit] {
      width: 50%;
      background-color: #00aaff;
        font-size:20px;
      padding: 14px 35px;
      margin: 12px 140px;
      cursor: pointer;
      border-radius: 10px;
    }
        </style>
    </head>
    <body>
        <center><h2>Hospital Staff Board</h2></center>
        <form action = "../controller/RegistrationCheck.php" onsubmit=" return Validation()" method = "post" enctype="multipart/form-data">
            <fieldset>
                <legend>
                Create New Account
                </legend>
                
            <table>
            <tr>
                    <td>
                        Name:
                    </td>
                    <td> 
                        <input type = "text" name = "name" id="name" value = ""/>  <td><p id="ErrName"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                    <input type = "text" name = "username" id="username" value="" >  <td><p id="ErrUName"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                    <input type = "password" name = "password" id="password" value="" >  <td><p id="ErrPass"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email:
                    </td>
                    <td> 
                        <input type = "text" name = "email" id="email" value = "" />  <td><p id="ErrMail"></p></td>
                    </td>
                </tr>

                <tr>
                    <td>
                        Contact:
                     </td>
                    <td>
                         <input type = "text" name = "phone" id="phone" value = "" />  <td><p id="ErrMobile"></p></td>
                    </td>
                </tr>
                

                <tr>
                    <td>
                        Gender: 
                    </td>
                    <td> 
                        <input type = "radio" name = "gender" value = "Male"/> Male
                        <input type = "radio" name = "gender" value = "Female"/> Female
                       <td> <p id="Errgender"></p></td>
                    </td>
                </tr>
                <tr>
                <td>Upload Photo</td>
                <th>
                    <input type="file" name="fileupload">
                </th>
                <td>
                </tr>
              

            </table>
            <br>
            <input type = "submit" name ="" value = "Sign Up">

            </fieldset>  
        </form>
    </body>
</html>