function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('vvd_time').innerHTML =
                    "<h3>" + h + ":" + m + ":" + s + "</h3>";
                    // "<strong>" + h + ":" + m + ":" + s + "</strong>";
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }

        function viveed_date(offset){
            if (offset === undefined){
                offset = 0;
            }
            var monthNames = [ "Ιανουαρίου", "Φεβρουαρίου", "Μαρτίου", "Απριλίου", "Μαΐου", "Ιουνίου",
                "Ιουλίου", "Αυγούστου", "Σεπτεμβρίου", "Οκτωβρίου", "Νοεμβρίου", "Δεκεμβρίου" ];
            var dayNames= ["Κυριακή","Δευτέρα","Τρίτη","Τετάρτη","Πέμπτη","Παρασκευή","Σάββατο"]

            var newDate = new Date();

            newDate.setDate(newDate.getDate() + offset);
            document.getElementById('vvd_date').innerHTML = "<strong>" + dayNames[newDate.getDay()] + "</strong><br><small>" + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear() + "</small>";

        }
