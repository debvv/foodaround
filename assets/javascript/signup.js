const form = document.querySelector(".signup form"),  
// querySelector() Document метод querySelector() возвращает первый элемент ( Element ) документа, 
// который соответствует указанному селектору или группе селекторов. 
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{ 
  // Событие onsubmit возникает при отправке формы, это обычно происходит,
  //  когда пользователь нажимает специальную кнопку Submit.
    e.preventDefault(); 
    // Метод preventDefault () интерфейса Event сообщает User agent, 
    // что если событие не обрабатывается явно, его действие по умолчанию не должно выполняться так, как обычно.
  }


continueBtn.onclick = ()=>{ // Событие onclick происходит, когда пользователь нажимает на элемент.
    //ajax
    let xhr = new XMLHttpRequest(); // XMLHttpRequest — API, доступный в скриптовых языках браузеров, 
    // таких как JavaScript. Использует запросы HTTP или HTTPS напрямую к веб-серверу и загружает данные ответа
    //  сервера напрямую в вызывающий скрипт.
    //создается xml object
    //xhr.open принимает много параметров,но мы передаем метод,ссылку,async
    xhr.open("POST", "assets/php/signup.php", true); 
    // open() объекта document позволяет открыть поток для записи документа (данные могут быть переданы 
    // с помощью методов write() или writeln() объекта document). Если документ существует,
    //  то этот метод очистит его содержимое (автоматический вызов метода .
    xhr.onload = ()=>{  
      // Описание Событие onload используется как указатель, что веб-страница полностью загружена, 
      // включая содержание, изображения, стилевые файлы и внешние скрипты.
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response; //xhr.response дает нам ответ на этот переданный url адрес
              if(data === "success"){
                location.href="index.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    //мы должны отправить данные формы через ajax на php. ниже представлена реализация
    let formData = new FormData(form); 
    // FormData — это специальная коллекция данных, которая позволяет передавать данные в виде пар [ключ, значение] 
    // на сервер при помощи fetch() или XMLHttpRequest .
    xhr.send(formData); // метод send() объекта XMLHttpRequest позволяет отправить запрос на сервер. 
    //creating new FormData object, sending the form data to php
}

//в гайде и пишут что это аякс