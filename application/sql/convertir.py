import re
import sys

playlists   = [ [] ]
prefijo     = "volcanmudo.gim/"

regex_playlist  = ".*a\s*href=\"(.*)\"\s*tar.*"
regex_imagen = "<media:gimg\s*'(.*)'\s*/>"
regex_titulo = ".*/em>(.*by.*)</h3></h.*"

pls = ""
img = ""
tit = ""

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
        if pls != "" and img != "" and tit != "":
            playlists[0] = [pls.strip(), img.strip(), tit.strip()]
            playlists.insert(0, [])
            pls = ""
            img = ""
            tit = ""
                
            
playlists.remove([])
for p in playlists:
    print(p)
