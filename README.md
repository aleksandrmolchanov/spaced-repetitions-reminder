# spaced-repetitions-reminder

Puzzle-English words spaced repetitions reminder

## Shuffling words in collection

The code below shuffles collections in line-by-line display mode if there is a parameter "shuffle in url:
```
const url = new URL(window.location.href);
if (url.searchParams.has("shuffle")) {
    let e = document.querySelectorAll(".dict__video__list-table > tbody > tr");
    allElems = function() {
        for (var r = [], t = e.length; t--;) r[r.length] = e[t];
        return r
    }();
    for (var r = function() {
            for (var e = allElems.length, r = []; e--;) {
                var t = Math.floor(Math.random() * allElems.length),
                    n = allElems[t].cloneNode(!0);
                allElems.splice(t, 1), r[r.length] = n
            }
            return r
        }(), t = e.length; t--;) e[t].parentNode.insertBefore(r[t], e[t].nextSibling), e[t].parentNode.removeChild(e[t])
}
```
