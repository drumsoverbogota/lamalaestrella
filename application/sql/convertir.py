import re
import sys

PLAYLIST = 0
IMAGEN = 1
TITULO = 2
MIXCLOUD = 3


playlists   = [ [] ]
prefijo     = "http://volcanmudo.com/lamalaestrella/files/gimgs/"

regex_playlist  = ".*a\s*href=\"(.*)\"\s*tar.*"
regex_imagen = "<media:gimg\s*'(.*)'\s*/>"
regex_titulo = ".*/em>(.*by.*)</h3></h.*"
regex_mixcloud = ".*src=\"(.*)\"\s*frameborder.*"

pls = ""
img = ""
tit = ""
mix = ""

contenido = """<div class="wrap">
<div id="img_wrap">
<img class="normal" src ="$IMAGEN$" />
</div>
</div>
<p> $TITULO$ </p>
<a href="$PLAYLIST$" target="_blank"><p><em>Playlist</em></p> </a>
<iframe class="frame" width="78" height="60"  src="$MIXCLOUD$" frameborder="0" ></iframe>"""

sql = """
INSERT INTO `playlists` (`id`, `titulo`, `contenido`, `fecha`, `year`) 
VALUES (NULL, '$TITULO$', '$CONTENIDO$', '$FECHA$', 'Primero');
"""



archivo = sys.argv[1]
print(archivo)
   
with open(archivo) as file_input:
    for line in file_input:
        """
        if '13_blanco.png' in line:
        el e:
        """
        match = re.search(regex_playlist, line)
        if match:
            pls = match.group(1)
        match = re.search(regex_imagen, line)
        if match:
            img = match.group(1)
        match = re.search(regex_titulo, line)
        if match:
            tit = match.group(1)
        match = re.search(regex_mixcloud, line)
        if match:
            mix = match.group(1)            
        if pls != "" and img != "" and tit != "" and mix != "":
            #playlists[0] = [pls.strip(), img.strip(), tit.strip()]
            #playlists.insert(0, [])
            playlists[len(playlists)-1] = [pls.strip(), img.strip(), tit.strip(), mix.strip()]
            playlists.append([])
            pls = ""
            img = ""
            tit = ""
            mix = ""
                
            
playlists.remove([])
print(len(playlists))

mes = 7
dia = 1
anho = 2017

with open('salida.sql', 'w') as output:    
    for p in playlists:
        html = contenido.replace("$PLAYLIST$", p[PLAYLIST])
        html = html.replace("$IMAGEN$", prefijo + p[IMAGEN])
        html = html.replace("$TITULO$", p[TITULO].replace("'", "\\'"))
        print(p[TITULO].replace("'", "\\'"))
        html = html.replace("$MIXCLOUD$", p[MIXCLOUD])
        #print('--------')
        #print(html.replace("\n", "\\r\\n"))
        query = sql.replace("$TITULO$", p[TITULO])
        query = query.replace("$CONTENIDO$", html.replace("\n", "\\r\\n"))
        query = query.replace("$FECHA$", '-'.join([str(anho), str(mes), str(dia)]))
        output.write(query)
        dia += 7
        if dia > 31:
            dia = 1
            mes += 1
        if mes > 12:
            mes = 1
            anho += 1
        if mes == 2 and dia > 27:
            dia = 27
        #break
