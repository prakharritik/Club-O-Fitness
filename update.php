<?php 
session_start();

require_once "pdo.php";
if(isset($_GET['id']))
$tid=$_GET['id'];
else {
	header("Location: dash.php");
	return;
}     
if(isset($_POST['perc'])){
    $stmt = $pdo->prepare('UPDATE  tasks set perc=:ng where tid=:fn and uid=:ln');

        $stmt->execute(array(
        		':ng' => $_POST['perc'],
                ':fn' => $tid,
                ':ln' => $_SESSION['uid'])
        );

        header("Location: dash.php");
        return;
}

?>
<!DOCTYPE html>
<html>
<head>

  <title>Health Track</title>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="styles.css">
   <link href='https://fonts.googleapis.com/css?family=EB Garamond' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script><link href="https://unpkg.com/tailwindcss@^2.0.4/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<script>
    const menu = document.getElementById('menu');
  const toggle = () => menu.classList.toggle("hidden");
  $( document ).ready(function() {
   if (screen.width < 760) {
    menu.classList.toggle("hidden");
}
});
</script><style>
        #app{
        background-color:  #464B6A;
        color: white;
      }
          .artboard{
      height: 50px;
      width:250px;
    }

</style>
    <style>
      .form-detail {
    padding: 20px 40px;
  position: relative;
    background-color: #AB2DFF;
    background-image: linear-gradient(#D001DF, #57B1FF);
margin-top: 50px;

    
}

.form-detail h2 {
  color: white;
}
.form-detail .form-group {
  display: flex;
  display: -webkit-flex;
  margin:  0 0px;
}
 .form-detail .form-row {
  width: 100%;
  position: relative;
}
.form-detail .form-group .form-row.form-row-1 {
  width: 50%;
  padding: 0 8px;
}
.form-detail label {
  font-weight: 600;
  font-size: 15px;
  color: #666;
  display: block;
  margin-bottom: 8px;
}
 

.form-detail .input-text {
  margin-bottom: 37px;
}
.form-detail input[type="text"],.form-detail input[type="email"],.form-detail input[type="number"] {
  width: 100%;
    padding: 9px 10px;
    border: 1px solid #e5e5e5;
    border-radius: 10px;
    box-shadow: 5px 5px 5px ;
    appearance: unset;
   
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    font-size: 15px;
    color: #333;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    
}
.form-detail .form-row input:focus {
  border: 1px solid blue;
}
 
.button3{
  border:solid 2px transparent;
  color: white;
  background-color: #7600C4;
  margin:auto;
  display:block;
  padding: 10px 30px 10px 30px;
  text-align: center;
  cursor: pointer;
  font-size: 22px;
  border-radius: 20px;
  width:50%;
  box-shadow: 10px 10px 20px  rgba(0, 0, 0, 0.5);
}



.button3:hover{
  color: #D001DF;
  background-color:white;
  border:solid 2px #7600C4;
  text-decoration: none;
}

.form-detail .textarea{
    width: 100%;
     padding: 12px 20px;
     box-sizing: border-box;
    border: 1px solid #e5e5e5;
         border-radius: 10px;
    box-shadow: 5px 5px 5px ;
     font-size: 16px;
     resize: none;
     
       margin-bottom: 20px;
       font-size: 1.2em;
   }
    </style>
</head>
<body>
<div class="font-sans antialiased" id="app">
  <nav class="flex items-center justify-between flex-wrap bg-teal p-6">
    <div class="flex items-center flex-no-shrink text-white mr-6">
      <svg class="jsx-2263963463 artboard"><svg viewBox="-314.33430719455686 -92 1277.6022810507657 200.00000000000003" xmlns="ttp://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" class="jsx-2263963463 artboard-inner" style="width: 480px; height: 75.1408px; max-height: 100%;"><g transform="translate(-3.790849673202614 48.12418300653596) scale(1.8155410312273055)" fill="#FFFFFF"><g id="line1"><path d="M50.760-14.976C47.952-8.568 42.768-4.968 36.288-4.968C25.776-4.968 17.928-14.184 17.928-26.568C17.928-36.216 23.544-42.984 31.608-42.984C36.288-42.984 41.112-40.392 44.208-36.144C46.080-33.624 46.656-32.472 48.168-28.656L49.680-29.088L45.576-49.824C44.568-48.312 43.632-47.736 41.832-47.736C41.256-47.736 40.536-47.880 39.168-48.096C35.136-48.816 31.752-49.176 28.800-49.176C12.744-49.176 2.088-39.528 2.088-24.984C2.088-9.360 14.400 1.224 32.616 1.224C34.200 1.224 35.856 1.152 37.584 1.008L42.336 0.576L43.704 0.504C43.848 0.432 44.064 0.432 44.280 0.432C45.504 0.432 45.936 0.648 46.656 1.584L52.416-14.400Z"></path><path d="M54.000-48.024L54.000-46.152C57.240-45.576 57.960-44.280 57.960-38.952L57.960-9.000C57.960-3.744 57.240-2.376 54.000-1.872L54.000 0L75.744 0L75.744-1.872C72.432-2.304 71.640-3.672 71.640-9.000L71.640-49.176Z"></path><path d="M107.496 0L124.200 0L124.200-1.872C120.960-2.448 120.312-3.744 120.312-9.000L120.312-36.504L102.240-35.496L102.240-33.696C105.768-33.336 106.632-31.968 106.632-26.496L106.632-20.376C106.632-12.024 103.824-6.912 99.360-6.912C96.696-6.912 95.760-8.568 95.760-13.104L95.760-36.504L78.048-35.496L78.048-33.696C81.288-33.192 82.080-31.824 82.080-26.496L82.080-9.720C82.080-2.808 85.392 0.936 91.512 0.936C92.808 0.936 94.392 0.720 95.760 0.360C99.936-0.792 102.960-2.736 106.632-6.552C106.776-2.736 106.848-2.160 107.496 0Z"></path><path d="M144.648-49.176L127.008-48.024L127.008-46.152C130.248-45.576 130.968-44.280 130.968-38.952L130.968-9.000C130.968-3.744 130.248-2.376 127.008-1.872L127.008 0L153.936 0C165.240 0 172.944-6.840 172.944-16.776C172.944-28.728 163.728-37.008 150.408-37.008C149.040-37.008 147.240-36.864 144.648-36.648ZM147.168-31.896C153.360-31.896 158.184-25.416 158.184-16.992C158.184-9.792 154.224-4.536 148.824-4.536C145.872-4.536 144.648-5.832 144.648-9.000L144.648-31.680C145.728-31.824 146.592-31.896 147.168-31.896Z"></path><path d="M187.056-48.024L176.688-48.024L178.416-28.728L185.256-28.728Z"></path><path d="M218.160-49.176C202.176-49.176 191.304-39.024 191.304-23.976C191.304-8.784 201.888 1.224 218.088 1.224C233.856 1.224 244.296-8.784 244.296-23.832C244.296-39.312 234.144-49.176 218.160-49.176ZM219.024-4.968C212.040-4.968 207.144-13.896 207.144-26.568C207.144-36.576 210.888-42.840 216.936-42.840C223.992-42.840 228.528-34.344 228.528-21.024C228.528-20.520 228.528-20.088 228.528-19.584C228.312-10.368 224.784-4.968 219.024-4.968Z"></path><path d="M259.056-48.024L248.688-48.024L250.416-28.728L257.256-28.728Z"></path><path d="M296.496-38.160L294.912-38.016C294.984-37.512 294.984-37.080 294.984-36.720C294.984-33.048 293.256-31.896 287.640-31.896L282.528-31.896L282.528-37.224C282.528-42.192 283.680-43.128 289.728-43.128C292.392-43.128 294.552-42.624 296.640-41.688C300.672-39.744 303.192-36.792 305.064-31.896L306.504-32.400L303.048-49.176C302.472-48.168 302.040-48.024 300.168-48.024L263.592-48.024L263.592-46.224C266.832-45.504 267.552-44.280 267.552-39.384L267.552-8.640C267.552-3.672 266.832-2.448 263.592-1.800L263.592 0L286.992 0L286.992-1.800C283.464-2.088 282.528-3.456 282.528-8.640L282.528-27.216L286.200-27.216C292.896-27.216 296.352-24.480 297.360-18.360L298.944-18.504Z"></path><path d="M307.800-35.496L307.800-33.696C311.040-33.048 311.688-31.752 311.688-26.496L311.688-9.000C311.688-3.744 311.040-2.448 307.800-1.872L307.800 0L329.544 0L329.544-1.872C326.160-2.304 325.368-3.672 325.368-9.000L325.368-36.504ZM318.672-53.496C314.208-53.496 310.968-50.616 310.968-46.800C310.968-43.128 314.064-40.392 318.312-40.392C322.632-40.392 325.944-43.128 325.944-46.800C325.944-50.760 322.920-53.496 318.672-53.496Z"></path><path d="M355.968-36.000L349.560-36.000L349.560-50.544C343.872-47.088 342.432-46.512 336.312-45.144C336.672-43.344 336.816-42.408 336.816-41.400C336.816-36.792 334.656-33.624 330.768-32.472L330.768-30.744L335.880-30.744L335.880-11.016C335.880-6.840 336.528-4.320 338.184-2.448C339.984-0.288 343.368 0.936 347.328 0.936C351.432 0.936 354.888 0.216 358.920-1.512L362.664-11.880L361.152-12.456C358.920-7.920 356.832-6.048 353.880-6.048C351.072-6.048 349.560-8.352 349.560-12.888L349.560-31.176L355.104-31.176C356.544-31.176 356.832-31.176 357.408-30.744L359.640-36.792C358.344-36.144 357.480-36.000 355.968-36.000Z"></path><path d="M378.720-36.504L362.952-35.496L362.952-33.696C366.192-33.120 366.912-31.824 366.912-26.496L366.912-9.000C366.912-3.744 366.192-2.376 362.952-1.872L362.952 0L385.056 0L385.056-1.872C381.456-2.160 380.592-3.528 380.592-9.000L380.592-17.928C380.592-24.696 383.400-29.088 387.576-29.088C390.024-29.088 390.888-27.432 390.888-22.680L390.888-9.000C390.888-3.672 390.096-2.304 386.856-1.872L386.856 0L408.600 0L408.600-1.872C405.360-2.304 404.568-3.672 404.568-9.000L404.568-24.624C404.568-27.360 404.424-29.448 404.064-30.888C403.200-34.488 399.384-36.936 394.776-36.936C389.592-36.936 384.912-34.488 380.592-29.592C379.800-34.272 379.728-34.632 378.720-36.504Z"></path><path d="M447.696-31.392C444.240-34.992 438.912-36.936 432.648-36.936C419.688-36.936 410.760-29.304 410.760-18.216C410.760-6.840 419.904 0.936 433.224 0.936C435.888 0.936 438.984 0.648 442.728-0.072C443.376-0.144 443.880-0.216 444.312-0.216C445.104-0.216 445.608 0 446.616 0.720L451.224-13.320L449.640-13.896C447.048-8.208 442.584-5.112 437.040-5.112C430.776-5.112 426.960-9.144 425.736-16.992L452.088-22.320C451.080-26.928 450.216-28.728 447.696-31.392ZM431.712-31.320C434.880-31.320 437.472-28.512 437.472-25.200C437.472-24.840 437.472-24.408 437.400-23.832L425.376-21.456C425.520-27.864 427.752-31.320 431.712-31.320Z"></path><path d="M484.416-35.856C484.128-35.856 483.552-35.856 482.760-36.000C482.112-36.000 481.536-36.072 481.032-36.216L479.016-36.504C477.360-36.792 475.416-37.008 473.400-37.008C462.456-37.008 454.968-31.968 454.968-24.552C454.968-19.872 458.424-16.560 465.048-15.048L472.032-13.320C476.352-12.312 477.720-11.376 477.720-9.504C477.720-6.336 474.120-4.032 469.080-4.032C462.384-4.032 458.280-7.272 456.264-14.040L454.680-13.752L455.760 0.720C456.696-0.360 457.488-0.648 458.928-0.648C459.648-0.648 460.512-0.576 462.024-0.288L464.904 0.288C466.920 0.720 469.584 0.936 471.744 0.936C483.480 0.936 491.832-5.256 491.832-14.040C491.832-19.224 488.880-22.248 481.752-24.120L473.832-26.280C470.592-27.144 469.368-28.008 469.368-29.376C469.368-31.104 471.816-32.328 475.272-32.328C480.168-32.328 483.768-30.240 486.000-25.920L487.440-26.064L486.936-36.720C485.784-36.072 485.208-35.856 484.416-35.856Z"></path><path d="M525.240-35.856C524.952-35.856 524.376-35.856 523.584-36.000C522.936-36.000 522.360-36.072 521.856-36.216L519.840-36.504C518.184-36.792 516.240-37.008 514.224-37.008C503.280-37.008 495.792-31.968 495.792-24.552C495.792-19.872 499.248-16.560 505.872-15.048L512.856-13.320C517.176-12.312 518.544-11.376 518.544-9.504C518.544-6.336 514.944-4.032 509.904-4.032C503.208-4.032 499.104-7.272 497.088-14.040L495.504-13.752L496.584 0.720C497.520-0.360 498.312-0.648 499.752-0.648C500.472-0.648 501.336-0.576 502.848-0.288L505.728 0.288C507.744 0.720 510.408 0.936 512.568 0.936C524.304 0.936 532.656-5.256 532.656-14.040C532.656-19.224 529.704-22.248 522.576-24.120L514.656-26.280C511.416-27.144 510.192-28.008 510.192-29.376C510.192-31.104 512.640-32.328 516.096-32.328C520.992-32.328 524.592-30.240 526.824-25.920L528.264-26.064L527.760-36.720C526.608-36.072 526.032-35.856 525.240-35.856Z"></path></g></g><g transform="translate(-349.7494616069484 -169.07754184697197) scale(3.5415154412391523)" id="logomark"><g fill="#FFFFFF"><path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M76.972 30.135a2.792 2.792 0 0 1 2.792-2.789h.003c3.081 0 5.58 2.5 5.58 5.581v22.331a5.578 5.578 0 0 1-5.583 5.573 2.79 2.79 0 0 1-2.792-2.788V30.135z"></path><path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M71.392 66.415c3.084 0 5.584-2.5 5.584-5.584V27.347c0-3.08-2.5-5.583-5.584-5.583a2.792 2.792 0 0 0-2.788 2.792v39.068a2.792 2.792 0 0 0 2.788 2.791h0zM23.028 58.046a2.79 2.79 0 0 1-2.792 2.785h-.006a5.578 5.578 0 0 1-5.577-5.577v-22.33c0-3.077 2.5-5.58 5.583-5.58a2.794 2.794 0 0 1 2.792 2.792v27.91z"></path><path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M28.605 21.764a5.585 5.585 0 0 0-5.583 5.58v33.487c0 3.084 2.5 5.584 5.583 5.584a2.794 2.794 0 0 0 2.792-2.789V24.559a2.795 2.795 0 0 0-2.792-2.795h0zM10 40.369h4.653v7.444H10zM85.347 40.369H90v7.444h-4.653zM60.118 47.813l.259 1.647-.256-1.647zM60.118 47.813h8.486v-7.444h-9.637z"></path><path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M65.293 47.813v2.51c0 .638-.123 1.249-.36 1.802a4.642 4.642 0 0 1-1.021 1.534v.013a4.748 4.748 0 0 1-1.533 1.019l-6.403 2.652c-.577.243-1.1.59-1.534 1.024v.01a4.732 4.732 0 0 0-1.38 3.34v16.52H36.617V57.07c-2.643-6.371-2.448-13.213 0-19.121a2.878 2.878 0 0 1 4.076 0v-1.618a4.324 4.324 0 0 1 6.118 0v-1.018a4.323 4.323 0 0 1 6.119 0v.859a3.782 3.782 0 0 1 5.354 0l.661 4.196 1.174 7.444h5.174z"></path><path fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M58.967 40.369l-.681-4.4c0-2.75 2.228-4.98 4.977-4.98v-.003c0 3.311.636 6.462 1.738 9.384h-6.034zM35.764 40.369h-4.368v7.444h3.33a24.996 24.996 0 0 1 1.038-7.444z"></path></g></g></svg></svg>
    </div>
    <div class="block sm:hidden">
      <button onclick="toggle()" class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </button>
    </div>
    <div  id="menu" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
      <div class="text-sm sm:flex-grow">
        <a href="index.php" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white mr-4">
          Home
        </a>
        <a href="explore.html" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white mr-4">
          Explore
        </a>
        <a href="training.html" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white mr-4">
          Training
        </a>
       <a href="writeblog.php" class="no-underline block mt-4 sm:inline-block sm:mt-0 text-teal-lighter hover:text-white">
          WriteBlog
        </a>
      </div>
      <div>
        <?php
        if(isset($_SESSION['uid']))
        echo '<a href="logout.php" class="no-underline inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-black mt-4 sm:mt-0">Logout</a>';
        else echo '<a href="login.html" class="no-underline inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-black mt-4 sm:mt-0">Login</a>';
        ?>
      </div>
    </div>
  </nav>
</div>
      <form class="form-detail" method="post" id="myform">
                    <h2>Update Task</h2>
                    <div class="form-row">
                      <input type="number" name="perc" required="required" placeholder="Updated Percentage">
                    </div>                   
                    <div style="width: 100%;" class="mt-5">
                      <input type="submit" value="Submit" class="button3">
                    </div>
      </form>

</body>
</html> 