<?php 
require '../../koneksi.php';

$id = $_GET["id"];

$log = query ("SELECT * FROM tanggapan WHERE id_pengaduan=$id")[0];



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Validasi</title>
 	<style type="text/css">
 		.hero{
            height: 10vh;
            width: 100%;
            background-image: url(../img/bg1.jpg);
            background-size: cover;
            background-position: center;
        }
        nav{
            background: #004650;
            display: flex;
            align-items: center;
            justify-content: space-between ;
            padding-top: 0px;
            padding-left: 10%;
            padding-right: 10%;
        }
        .logo a{
            color: white;
            font-size: 28px ;
            text-decoration: none;
        }
        button{
            border: none;
            background: #00A180;
            padding: 12px 30px;
            border-radius: 30px;
            transition: .3s;
        }
        button a{
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
        }
        .login-wrap{
	width:100%;
	margin: auto;
	max-width:560px;
	min-height:460px;
	position:relative;
	right:0px;
	top: 20px;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
	
	
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:30px 10px 10px 20px;
	
}
.login-html .login-form .login-form {
	text-transform:uppercase;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}


.login-form .group .input,
.login-form .group .button{
	width: 500px;
	border:none;
	padding:10px;
	border-radius:0px;
	background:rgba(146, 147, 158,.3);
	}


.login-form .group .label{
	color:black;
	font-size:14px;
}

.login-form .group .button{
	background:#004651;
}
.login-form .group label .icon{
	width:15px;	
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:grey;
}

.login-form .group .input{
	color: black;
}

.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:px;
	display:inline-block;
	border-bottom:2px solid transparent;
	color: black;
}
.login-form .group .input{
	color: black;
}

.login-form{
	padding-top: 10px;
}

 	</style>
 </head>
 <body>
 	<!-- NAVBAR -->
    <div class="hero">
        <nav>
            <h2 class="logo"><a href="" style="text-align: left;">Pengaduan Masyarakat</a></h2>
            <button type="button"><a href="../beranda-user.php">Kembali</a></button>
        </nav>
    </div>

<center>
    <div class="login-wrap">
		<div class="login-html">
        	<div class="login-form">
				<div class="sign-in-htm">
					<center>
					<?php echo $log["tanggapan"];
						 

					  ?>
					</center>

				</div>
			</div>
		</div>
	</div>
</center>
    
 
 </body>
 </html>