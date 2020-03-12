# Javascript e CSS treeview
## Codice
```html
<pre>

<code>

    <!DOCTYPE html>
    <html>
    <body>

        <p id="p1">Hello World!</p>
        <p id="p2">Hello World!</p>

        <script>
        document.getElementById("p2").style.color = "blue";
        document.getElementById("p2").style.fontFamily = "Arial";
        document.getElementById("p2").style.fontSize = "larger";
        document.getElementById("p1").style.color = "red";
        document.getElementById("p1").style.fontFamily = "Monserrat";
        document.getElementById("p1").style.fontSize = "smaller";
        </script>

        <p>The paragraph above was changed by a script.</p>

    </body>
    </html>
    </code>
</pre>
```

## Spiegazione
```html
Si apre il tag <script></script> in html e si usa la funzione di Javascript dell'oggetto document getElementById(id), dopo di che si scrive: .style e si tratta la funzione come fosse una normalissima stringa di codice css  
```