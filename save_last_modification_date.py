# Simple script to hardcode into a file the date of
# modification of files
# It's required because FTP erases it

import os
from datetime import datetime
import json

d = {}

for root, _, files in os.walk("."):
    if ".git/" not in root:
        for f in files:
            if "php" in f:
                path = os.path.join(root, f)
                d[path[2:-4]] = os.path.getmtime(path)

with open("last_modification_date.json", "w") as f:
    f.write(json.dumps(d, indent=None, separators=(',', ':')))