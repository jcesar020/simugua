

<style type="text/css">

    @page {
        margin-top: 3em;
        margin-left: 7em;
        margin-bottom: 3em;
        margin-right: 3em;
    }

    .page-break {
        page-break-after: always;
    }

    body {

        margin: 2.5cm 0 0 ;
        text-align: justify;
    }

    .header,
    .footer {
        position: fixed;
        left: 0;
        right: 0;
        color: #000;
        font-size: 0.9em;
    }

    .header {
        top: 0;
        height: 2.5cm;
     /*   border-bottom: 0.1pt solid #aaa;*/
    }

    .footer {
        bottom: 0;
        border-top: 0.1pt solid #aaa;
    }

    .derecha{
        text-align: right;
    }

    .centro {
        text-align: center;
    }

    table.gridtable {
        font-family: verdana,arial,sans-serif;
        font-size:10pt;
        color:#333333;
        border-width: 1px;
        border-color: #666666;
        border-collapse: collapse;

    }
    table.gridtable th {
        border-width: 1px;
        padding: 8px;
/*        border-style: solid;*/
        border-color: #666666;
        background-color: #eee;

    }
    table.gridtable td {
        border-width: 1px;
        padding: 2px;
       /* border-style: solid;*/
        border-color: #666666;
        background-color: #ffffff;
    }

    .border-t  {
        border-top: .5px solid;


    }
    .border-2  {
        border-top: .5px solid;
        border-bottom: solid;
        font-weight: bold;

    }

 /*   table.gridtable thead{
        border-style: solid;
    }*/

    .page-number {
        text-align: right;
    }

    .page-number:before {
        content: "Pagina " counter(page)  ;
    }
</style>