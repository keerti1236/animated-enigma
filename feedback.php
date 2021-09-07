<!DOCTYPE html>
<head>   <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>Feedback</title>
    <style>
    #divf{
        position: relative;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
        height: 650px;  
        border: 2px solid rgba(12, 12, 12, 0.8); 
        background-image: url(images/fb1.jpg);
        background-position:center;
        background-repeat: no-repeat;
        border-spacing: 0px 0px 30px;
        background-size: cover; 
        }
        #hu{
            position: relative;
            height: 300px;
        }
        #bk{
            position: relative;
            height: 500px;
            left: 550px;
        }
    </style>    
</head>
<body>
    <div id="divf">
    <form>
        <table align="center"id="hu">
            <tr >
            <td><h2>Feedback</h2></td>
            <td>
                <textarea name="feedback" cols="45" rows="5"></textarea>
            </td>
            </tr>
            <tr>
                <td align="center" colspan="2" >
                <input type="submit" name="submit" value="Submit" />
                <input type="reset" name="reset"  value="Reset"  />
            </td>
             </tr>
        </table>
    
    </form>
    <h3 id="bk"><strong>Back</strong></h3>
    </div>
</body>