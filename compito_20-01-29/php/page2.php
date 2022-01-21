<!DOCTYPE HTML>
<html>
 <head>
   <title>Scegli la tua nuova automobile</title>
 </head>
 <body>
   <div class="container">
     <div class="main">
       <h2>Allestimento</h2>
       <hr/>
       <span id="error">
       </span>
       <form action="page3.php" method="post">
         <label>Modello :<span>*</span></label><br />
         <input name="modello" id="modello" type="text" value=""><br />
         <label>Versione :<span>*</span></label><br />
         <input name="versione" id="versione" type="text" value=""><br />
         <label>Motore :<span>*</span></label><br />
         <select name="motore"><br />
           <option value="">----Select----</options>
           <option value="1.0">1.0 VVT-i (72 CV) 5 Marce Manuale</option>
           <option value="1.5hyb">1.5 Hybrid (100 CV) E-CVT</option>
           <option value="1.5">1.5 VVT-iE (111 CV) 6 Marce Manuale</option>
           <option value="1.6">1.6 VVT-iE (131 CV) 6 Marce Manuale</option>
         </select><br />
         <label>Colore :<span>*</span></label><br />
         <select name="colore">
           <option value="">----Select----</option>
           <option value="rosso">rosso</option>
           <option value="nero">nero</option>
           <option value="giallo">giallo</option>
           <option value="verde">verde</option>
           <option value="blu">blu</option>
         </select><br />
        <input type="reset" value="Reset" />
        <input type="submit" value="Next" />
       </form>
     </div>
   </div>
 </body>
</html>
