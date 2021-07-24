const ThemeMode = document.getElementById('ThemeMode');
const themecss = document.getElementById('ThemeStyle');
//when a theme is selected or changed from the original, this will call
if (ThemeMode) {
  ThemeMode.addEventListener('change', function () {
    console.dir(this);
    themecss.setAttribute('href', 'css/' + this.value + '.css');
  });
}
