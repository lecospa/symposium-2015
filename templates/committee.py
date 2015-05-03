#!/usr/bin/env python3
import sys
fname = sys.argv[1]
with open(fname, 'r') as f:
    s = f.read()

s = s.split("\n")
del s[-1]

s = [x.split("\t") for x in s]
for x in s:
    print('<div class="col-sm-4 col-md-3">')
    print('<div class="thumbnail"><img src="img/committee/{}.JPG" class="img-responsive img-circle" style="height: 150px;">'.format(x[0]))
    print('<h3>{}</h3>'.format(x[0]))
    if len(x) == 2:
        print('<a href="{}">{}</a>'.format(x[1], x[1]))
    print('</div></div>')
