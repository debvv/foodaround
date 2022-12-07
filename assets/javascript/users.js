const searchBar = document.querySelector(".search input"), // querySelector() Document метод querySelector() возвращает первый элемент ( Element ) документа, который соответствует указанному селектору или группе селекторов. 
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show"); // Метод toggle объекта classList чередует заданный CSS класс элемента: добавляет класс, если его нет и удаляет, если есть.
  searchIcon.classList.toggle("active");
  searchBar.focus(); // Метод focus устанавливает фокус на элементе (чаще всего на инпуте). Это значит, что в этом инпуте начнет моргать курсор и вводимый с клавиатуры текст будет попадать именно в этот инпут.
  if(searchBar.classList.contains("active")){ // classList. contains("class") – проверка наличия класса, возвращает true/false .
    searchBar.value = "";
    searchBar.classList.remove("active"); // Метод используется для удаления класса у элемента. В качестве аргумента нужно передавать строку с именем класса.
  }
}

searchBar.onkeyup = ()=>{ // Событие onkeyup возникает, когда пользователь отпускает нажатую клавишу клавиатуры. 
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active"); // add() Этот метод используется для добавления класса к элементу.
  }else{
    searchBar.classList.remove("active"); // remove() Метод используется для удаления класса у элемента.
  }
  let xhr = new XMLHttpRequest(); // XMLHttpRequest – это встроенный в браузер объект, который даёт возможность делать HTTP-запросы к серверу без перезагрузки страницы. 
  xhr.open("POST", "assets/php/search.php", true); // open() объекта document позволяет открыть поток для записи документа (данные могут быть переданы с помощью методов write() или writeln() объекта document).
  xhr.onload = ()=>{ // Описание Событие onload используется как указатель, что веб-страница полностью загружена, включая содержание, изображения, стилевые файлы и внешние скрипты.
    if(xhr.readyState === XMLHttpRequest.DONE){ // 
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // setRequestHeader() устанавливает значения HTTP заголовков.
  xhr.send("searchTerm=" + searchTerm); // send() объекта XMLHttpRequest позволяет отправить запрос на сервер. 
}

setInterval(() =>{ // Функция setInterval производит выполнение кода через указанный интервал времени. Первым параметром следует передавать функцию-коллбэк, а вторым - время в миллисекундах, указывающее, через какой промежуток будет повторяться код, заданный первым параметром.
  let xhr = new XMLHttpRequest(); // XMLHttpRequest — API, доступный в скриптовых языках браузеров, таких как JavaScript.
  xhr.open("GET", "assets/php/users.php", true); // open() объекта document позволяет открыть поток для записи документа (данные могут быть переданы с помощью методов write() или writeln() объекта document). Если документ существует, то этот метод очистит его содержимое (автоматический вызов метода .
  xhr.onload = ()=>{ // Описание Событие onload используется как указатель, что веб-страница полностью загружена, включая содержание, изображения, стилевые файлы и внешние скрипты.
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);//функция будет запущена через частоту в ms
 
