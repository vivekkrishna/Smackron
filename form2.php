<html>
    <head>
       
       <link rel="stylesheet" type="text/css" href="form2.css"/>
        <script type="text/javascript" src="form2.js"></script>
    </head>
    <body style="margin: 0px; background-color: #e6e7d8">
        
        <div id="one">
           <img src="images/logo2.jpg" height="75" width="100"/> 
        </div>
        <form action="register.php"method="post">
        <div id="two">
            
            <h3 align="center">LOGIN DETAILS</h3>
                
            <table align="center">
                
                    <tr>
                        <td>full name</td>
                        <td><input type="text"name="fullname"/></td>
                    </tr>
<!--                    <tr>
                        <td>nick name</td>
                        <td><input type="text"name="nickname"/></td>
                    </tr>       -->
                    <tr>
                        <td>email</td>
                        <td><input type="text"name="email"/></td>
                    </tr>
                    <tr>
                        <td>password</td>
                        <td><input type="password"name="password"/></td>
                    </tr>
                    <tr>
                        <td>confirm password</td>
                        <td><input type="password"name="confirmpw"/></td>
                    </tr>
                    <tr>
                        <td>gender</td>
                        <td>
                            <input type="radio"name="gender"value="male">male
                            <input type="radio"name="gender"value="female">female
                        </td>
                    </tr>
                    </table>
            <BR/>
            <h3 align="center">USER DETAILS</h3>
            
            <table align="center" style="position: absolute;bottom: 0px;">
                
                <tr>
                    <td>date of birth</td>
                    <td>
                        <select id="month" name="month">
                            <option>select month</option>
                            <option value="1">jan</option>
                            <option value="2">feb</option>
                            <option value="3">mar</option>
                            <option value="4">apr</option>
                            <option value="5">may</option>
                            <option value="6">jun</option>
                            <option value="7">july</option>
                            <option value="8">aug</option>
                            <option value="9">sep</option>
                            <option value="10">oct</option>
                            <option value="11">nov</option>
                            <option value="12">dec</option>
                        </select>
                    </td>
                    <td>
                        <select id="day" name="day">
                            <option>select day</option>
                        </select>
                    </td>
                    <td>
                        <select id="year" name="year">
                            <option>select year</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>height</td>
                    <td>
                        <select name="height">
                            <option>select</option>
                            <option value="2.0-3.0">2'0-3'0</option>
                            <option value="3.0-4.0">3'0-4'0</option>
                            <option value="4.0-4.6">4'0-4'6</option>
                            <option value="4.6-5.0">4'6-5'0</option>
                            <option value="5.1">5'1</option>
                            <option value="5.2">5'2</option>
                            <option value="5.3">5'3</option>
                            <option value="5.4">5'4</option>
                            <option value="5.5">5'5</option>
                            <option value="5.6">5'6</option>
                            <option value="5.7">5'7</option>
                            <option value="5.8">5'8</option>
                            <option value="5.9">5'9</option>
                            <option value="5.10">5'10</option>
                            <option value="5.11">5'11</option>
                            <option value="6.0">6'0</option>
                            <option value="6.1">6'1</option>
                            <option value="6.2">6'2</option>
                            <option value="6.3">6'3</option>
                            <option value="6.4">6'4</option>
                            <option value="6.5">6'5</option>
                            <option value="6.6">6'6</option>
                            <option value="6.6-7.0">6'6-7'0</option>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>weight</td>
                    <td>
                        <select name="weight">
                            <option>select</option>
                            <option value="20-30">20-30</option>
                            <option value="30-40">30-40</option>
                            <option value="40-50">40-50</option>
                            <option value="50-55">50-55</option>
                            <option value="55-60">55-60</option>
                            <option value="60-65">60-65</option>
                            <option value="65-70">65-70</option>
                            <option value="70-75">70-75</option>
                            <option value="75-80">75-80</option>
                            <option value="80-85">80-85</option>
                            <option value="85-90">85-90</option>
                            <option value="90-95">90-95</option>
                            <option value="95-100">95-100</option>
                            <option value="100-110">100-110</option>
                            <option value="110-120">110-120</option>
                            <option value="120-130">120-130</option>
                            <option value="130-140">130-140</option>
                            <option value="140-160">140-160</option>
                            <option value="160-200">160-200</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>occupation</td>
                    <td>
                        <select name="occupation">
                            <option>select</option>
                            <option value="still student">still student</option>
                            <option value="employee">employee</option>
                            <option value="employer">employer</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>marital status</td>
                    <td>
                        <input type="radio" name="maritalstatus" value="unmarried">unmarried</input>
                    </td>                   
                    <td>
                        <input type="radio" name="maritalstatus" value="married">married</input>
                    </td>
                </tr>
                <tr>
                        <td>place</td>
                        <td>
                            <select name="country">
                                <option value="india">india</option>
                                <option value="america">america</option>
                            </select>
                        </td>
                        <td>
                            <select name="state">
                                <option value="andhra pradesh">andhra</option>
                                <option value="florida">florida</option>
                            </select>
                        </td>
                        <td>
                            <select name="nearbycity">
                                <option value="tirupati">tirupati</option>
                                <option value="florida">florida</option>
                            </select>
                        </td>
                    </tr>
                    <!--<tr>
                        <td>schooling</td>
                        <td><input type="text"name="schooling"/></td>                        
                    </tr>
                    <tr>
                        <td>intermediate</td>
                        <td><input type="text"name="intermediate"/></td>                        
                    </tr>
                    <tr>
                        <td>graduation</td>
                        <td><input type="text"name="graduation"/></td>                        
                    </tr>
                    <tr>
                        <td>languages known</td>
                        <td><input type="text"name="languagesknown"/></td>                        
                    </tr>-->
            </table>
        </div>
        <div id="three" >
            <h3 align="center">LIKES AND TASTES<br/>&nbsp;THIS HELPS YOU TO FIND PEOPLE SIMILAR TO YOU</h3>
            <table align="center" style="position: absolute;top: 200px;height: auto;">
                <tr><td><img src="images/hoverblue.png"/></td></tr>
               <tr id="r1">
                    <td align="center">color u like</td>
                    <td align="center">
                        <select name="color" onchange="f1(1)">
                            <option>select</option>
                            <option value="white">white</option>
                            <option value="black">black</option>
                        </select>
                    </td>
                </tr>
                <tr id="r2">
                    <td align="center">select anyone</td>
                    <td align="center">
                        <input type="radio" name="taste" value="sweet" onclick="f1(2)">sweet</input></td><td align="center">
                        <input type="radio" name="taste" value="hot" onclick="f1(2)">hot</input></td><td align="center">
                        <input type="radio" name="taste" value="both" onclick="f1(2)">both</input>
                    </td>
                </tr>
                <tr id="r3">
                    <td align="center">believe in god</td>
                    <td align="center">
                       <input type="radio" name="god" value="yes" onclick="f1(3)">yes</input></td><td>
                        <input type="radio" name="god" value="no" onclick="f1(3)">no</input> 
                    </td>
                </tr>
                <tr id="r4">
                    <td align="center">select anyone</td>
                    <td align="center">
                        <input type="radio" name="any" value="fruits" onclick="f1(4)">fruits</input></td><td>
                        <input type="radio" name="any" value="chocolates" onclick="f1(4)">chocolates</input></td><td>
                        <input type="radio" name="any" value="sweet" onclick="f1(4)">sweet</input></td><td>
                        <input type="radio" name="any" value="fastfoods" onclick="f1(4)">fast foods</input></td><td>
                        <input type="radio" name="any" value="ice creams" onclick="f1(4)">ice creams</input>
                    </td>
                </tr>
                <tr id="r5">
                    <td align="center">u wanna be</td>
                    <td align="center">
                        <input type="radio" name="wanna" value="simple,smart" onclick="f1(5)">simple n smart</input></td><td>
                        <input type="radio" name="wanna" value="stylish,rocking" onclick="f1(5)">stylish n rocking</input>
                    </td>
                </tr>
                <tr id="r6">
                    <td align="center">one u like most</td>
                    <td align="center"><input type="radio" name="most" value="parent" onclick="f1(6)">parent</input></td>
                    <td align="center"><input type="radio" name="most" value="broorsis" onclick="f1(6)">brother r sister</input></td>
                    <td align="center"><input type="radio" name="most" value="friend" onclick="f1(6)">friend</input></td>
                    <td align="center"><input type="radio" name="most" value="lover" onclick="f1(6)">lover</input></td>
                    <td align="center"><input type="radio" name="most" value="lifepartner" onclick="f1(6)">life partner</input></td>
                </tr>
                <tr id="r7">
                    <td align="center">if u r rich</td>
                    <td align="center"><input type="radio" name="rich" value="socialservice" onclick="f1(7)">social service</input></td>
                    <td align="center"><input type="radio" name="rich" value="enjoy self" onclick="f1(7)">enjoy self</input></td>
                    <td align="center"><input type="radio" name="rich" value="more rich" onclick="f1(7)">become more rich</input></td>
                </tr>
                <tr id="r8">
                    <td align="center">u life wanna be</td>
                    <td align="center"><input type="radio" name="want" value="simple n happy" onclick="f1(8)">simple and happy</input></td>
                    <td align="center"><input type="radio" name="want" value="historical n legendary" onclick="f1(8)">historical and legendary</input></td>
                </tr>
                <tr id="r9">
                    <td align="center">ur dream</td>
                    <td align="center">
                        <select name="dream" onchange="f1(9)">
                            <option>select</option>
                            <option value="654321">654321</option>
                            <option value="engineer">engineer</option>
                            <option value="business man">business man</option>
                            <option value="doctor">doctor</option>
                        </select>
                    </td>
                </tr>
                <tr id="r10">
                    <td align="center">ur favourite hobby</td>
                    <td align="center">
                        <select name="hobby" multiple onchange="f1(10)">
                           
                            <option value="singing">singing</option>
                            <option value="playingonmusicalinstruments">playing on musical instruments</option>
                            <option value="dancing">dancing</option>
                            <!--<option value="unionofspd">Union of dancing, singing, and playing instrumental music</option>
                            <option value="Writinganddrawing">Writing and drawing</option>
                            <option value="Tattooing">Tattooing</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>-->
                            
                        </select>
                    </td>
                </tr>
                <tr><td align="left"><img src="images/prev.gif"/></td><td align="right"><img src="images/next.gif"/></td></tr>
            </table>
            
        </div>
        <div id="four">
            <center><input type="submit" value="REGISTER" id="r11" style="background-color: skyblue"/></center>
        </div>
        </form>
    </body>
</html>

