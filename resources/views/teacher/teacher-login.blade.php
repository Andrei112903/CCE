 <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
                        <style>

                            

                            * {

                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            
                            }
                            
                            .Rectangle {
                                position: relative;
                                height: 100vh;
                                width: 100%;
                                background-image: url('/image/Rectangle 5.png');
                                background-size: cover;
                                background-position: center;
                            }
                            
                            .Rectangle::before {
                                content: '';
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(135, 54, 54, 0.7); 
                                z-index: 1;
                            }

                            .Overlay {


                                height: 100vh;
                                width: 100%;
                                display: flex;  
                                justify-content: center;
                                align-items: center;
                                text-align: center;
                                position: relative;
                                z-index: 2;
                            
                            }

                            

                        
                            form {

                                display: flex;
                                flex-direction: column;
                                gap: 15px;
                                margin-top: 20px;

                            }

                            .BoxContainer {

                                display: flex;
                                flex-direction: column;
                                background-color: white !important;
                                padding: 50px;
                                border-radius: 10px;
                                height:35em;
                                width: 450px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                text-align: center;
                                z-index: 5;
                                position: relative;
                            }

                            .Logo {
                                
                                display: flex;
                                flex-direction: row;
                                width: 120px;
                                height: auto;
                                align-items: space-between;
                                gap: 15px;
                                margin-bottom: 20px;
                                justify-content: center;
                                
                            }

                            .Logo img {

                                width: 100%;
                                height: 100%;
                                object-fit: contain;

                            }

                            .Logo div {

                                text-align: left;
                            }

                            .Logo h2 {
                                
                                font-size: 24px;
                                font-weight: bold;
                                margin-bottom: 5px;
                            }
                            
                            .Logo p {

                                font-size: 14px;
                                color: #666;
                            }
                            .logo-container{

                                display:flex;
                                align-items: center;
                                gap: 15px;
                                margin-bottom: 20px
                            }                                                       

                            .logo-container h2 {

                                font-size: 30px;
                                margin-bottom: 5px;
                                color: black;
                            }

                            .logo-container p {

                                font-size: 20px;
                                color: black;
                            }
                            .h2 {

                                color: white;
                                font-size: 36px;
                                margin-bottom: 20px;

                            }
                            input{
                                border:0.5px solid gray;
                                border-radius: 4px;
                                padding: 10px 15px;
                                margin-bottom: 10px;
                                box-sizing: border-box;
                                font-size:0.8em;
                                
                            }
                            .btnlogin{
                                
                                background-color: #BC0000;
                                color: white;
                                border: none;
                                cursor: pointer;
                                font-size: 16px;
                                font-weight: bold;
                                transition: background-color 0.2s;
                            }
                            .btnlogin:hover {
                                
                                background-color: #D23030;
                                

                            }



                           
                        </style>
                    </head>


                    <body>

                    <div class="Rectangle"> 
                        <div class="Overlay">
                            <div>
                                <h2>Welcome to UM</h2>
                                <div class="BoxContainer">
                                    <div class="logo-container">
                                        <div class="Logo"><img src="/image/um-seal.png" alt="UM Logo"></div>
                                        
                                        <div>
                                            <h2>Teacher Portal</h2>
                                            <p>Tagum Campus</p>

                                        </div>
                                    </div>
                                    <form method="POST" action="/teacher/login">
                                        @csrf
                                        
                                        @if ($errors->any())
                                            <div style="background-color: #fee; color: #c33; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                                                {{ $errors->first() }}
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div style="background-color: #dfd; color: #3a3; padding: 12px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <input type="text" name="email" value="{{ old('email') }}" placeholder="Email or Teacher ID Number" required>
                                        <input type="password" name="password" placeholder="Password" required>
                                        <input class="btnlogin" type="submit" value="Login">
                                    </form>
                                    <p style="margin-top: 15px; font-size: 14px; color: #666;">
                                    If you're a new teacher, please create your account
                                    to access your teacher portal. <a href="/teacher/register" style="color: #BC0000; font-weight: 600; text-decoration: none; cursor: pointer; position: relative; z-index: 10;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Register Now</a>
                                    </p>

                                    <a href="{{ route('password.request', ['type' => 'teacher']) }}" style="display: block; margin-top: 15px; color: #BC0000; text-decoration: none; font-size: 14px; font-weight: 600;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Forgot your Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        

                    </body>
                    </html>

