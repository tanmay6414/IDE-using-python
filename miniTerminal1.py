import commands
import gi
gi.require_version('Gtk', '3.0')

from gi.repository import Gtk
from gi.repository import GObject


wnd = Gtk.Window()
wnd.set_default_size(400, 400)
#wnd.connect("destroy", Gtk.main_quit)
label = Gtk.TextView()
#label.set_alignment(0, 0)
buffer=label.get_buffer()
wnd.add(label)
wnd.show_all()
cmd = 'python add1.py'

output = commands.getoutput(cmd)
def update_terminal():
    buffer.set_text(output)
    label.set_editable(False)
    

GObject.timeout_add(100, update_terminal)
Gtk.main()

