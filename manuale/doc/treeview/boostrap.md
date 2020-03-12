# Treview in bootstrap

## Come crearla

```html

Per creare un elementodella lista è necessario in primo luogo creare una lista.
Per creare la lista è necessario un <div> di classe "treeview" e un id per indentificare la lista, al suo interno è necessario inserire un <ul> e al su interno tanti <li> di classe "list-group-item" e, sempre all'interno della classe bisogna mettere l'id della treeview di cui fa parte, inoltre all'interno della classe.

```

## Codice

```html

        <div id="treeview2" class="treeview">
            <ul class="list-group">
                <li class="list-group-item node-treeview2" data-nodeid="0" style="color:undefined;background-color:undefined;">
                    <span class="icon expand-icon glyphicon glyphicon-plus"></span>
                    <span class="icon node-icon"></span>
                    Parent 1
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="5" style="color:undefined;background-color:undefined;">
                    <span class="icon glyphicon"></span>
                    <span class="icon node-icon"></span>
                    Parent 2
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="6" style="color:undefined;background-color:undefined;">
                    <span class="icon glyphicon"></span>
                    <span class="icon node-icon"></span>
                    Parent 3
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="7" style="color:undefined;background-color:undefined;">
                    <span class="icon glyphicon"></span>
                    <span class="icon node-icon"></span>
                    Parent 4
                </li>
                <li class="list-group-item node-treeview2" data-nodeid="8" style="color:undefined;background-color:undefined;">
                    <span class="icon glyphicon"></span>
                    <span class="icon node-icon"></span>
                    Parent 5
                </li>
            </ul>
        </div>

```
