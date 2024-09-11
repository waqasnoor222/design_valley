
<div class=content>
  <div class="wrapper-1">
    <div class="wrapper-2">
      <h1>Thank you !</h1>
      <p>for contacting us, we will get in touch with you soon... </p>
      <a href="index.php" class="go-home">
      go home
      </a>
    </div>
   
</div>
</div>



<style>
    
.wrapper-1{
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
    padding: 30px;
    text-align: center;
    padding-bottom: 50px;
}
h1{
    font-family: 'Kaushan Script', cursive;
  font-size:4em;
  letter-spacing:3px;
  color:#c30010 ;
  margin:0;
  margin-bottom:20px;
}
.wrapper-2 p{
    margin: 0;
    font-size: 1.3em;
    color: #8f8f8f;
    font-family: 'Source Sans Pro', sans-serif;
    /* letter-spacing: 1px; */
    margin-bottom: 50px;
    font-family: arial;
}
.go-home{
  color:#fff;
  background:#c30010;
  border:none;
  padding:10px 50px;
  margin:30px 0;
  border-radius: 15px;
  text-transform:capitalize;
  /* box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1); */
}
.footer-like{
  margin-top: auto; 
  background:#D7E6FE;
  padding:6px;
  text-align:center;
}
.footer-like p{
    margin: 0;
    font-size: 1.3em;
    color: #8f8f8f;
    font-family: 'Source Sans Pro', sans-serif;
    /* letter-spacing: 1px; */
    margin-bottom: 50px;
    font-family: arial;
}
.footer-like p a{
  text-decoration:none;
  color:#5892FF;
  font-weight:600;
}
.wrapper-2 a{
    text-decoration: none;
    font-family: arial;
    padding: 16px 80px;
}
@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
    display: flex;
        align-items: center;
        height: 100%;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  /* margin-top:50px; */
  box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
  border-radius: 17px
}
  
}
</style>