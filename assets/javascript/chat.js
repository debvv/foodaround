const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
// querySelector() Document метод querySelector() возвращает первый элемент ( Element ) документа, 
// который соответствует указанному селектору или группе селекторов. 
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{  
    // Событие onsubmit возникает при отправке формы, это обычно происходит,
    // когда пользователь нажимает специальную кнопку Submit.
    e.preventDefault();
    // Метод preventDefault () интерфейса Event сообщает User agent, 
    // что если событие не обрабатывается явно, его действие по умолчанию не должно выполняться так, как обычно.
}

inputField.focus(); 
// Метод focus устанавливает фокус на элементе (чаще всего на инпуте). 
// Это значит, что в этом инпуте начнет моргать курсор и вводимый с клавиатуры текст будет попадать именно в этот инпут.
inputField.onkeyup = ()=>{ 
    // Событие onkeyup возникает, когда пользователь отпускает нажатую клавишу клавиатуры. 
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{ 
    // Событие onclick происходит, когда пользователь нажимает на элемент.
    let xhr = new XMLHttpRequest(); 
    // XMLHttpRequest — API, доступный в скриптовых языках браузеров, таких как JavaScript. 
    // Использует запросы HTTP или HTTPS напрямую к веб-серверу и загружает данные ответа сервера 
    // напрямую в вызывающий скрипт. 
    xhr.open("POST", "assets/php/insert-chat.php", true); 
    xhr.onload = ()=>{ 
        // Описание Событие onload используется как указатель, что веб-страница полностью загружена, 
        // включая содержание, изображения, стилевые файлы и внешние скрипты.
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{ 
    // Событие mouseenter вызывается в Element когда указательное устройство (обычно мышь) изначально перемещается так,
    //  что его горячая точка находится в пределах элемента, в котором было запущено событие.
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{ 
    // mouseleave() привязывает JavaScript обработчик событий "mouseleave"
    // (срабатывает,когда указатель мыши выходит из элемента), или запускает это событие на выбранный элемент.
    chatBox.classList.remove("active");
}

setInterval( () =>{ 
    // Функция setInterval производит выполнение кода через указанный интервал времени. 
    // ajax start
    let xhr = new XMLHttpRequest();  //создание объекта xml
    xhr.open("POST", "assets/php/get-chat.php", true); 
    // open() объекта document позволяет открыть поток для записи документа 
    // (данные могут быть переданы с помощью методов write() или writeln() объекта document). 
    // Если документ существует, то этот метод очистит его содержимое (автоматический вызов метода.
    xhr.onload = ()=>{ 
        // Описание Событие onload используется как указатель, что веб-страница полностью загружена, 
        // включая содержание, изображения, стилевые файлы и внешние скрипты.
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    // setRequestHeader() устанавливает значения HTTP заголовков.
    xhr.send("incoming_id="+incoming_id); 
    //  метод send() объекта XMLHttpRequest позволяет отправить запрос на сервер. 
}, 500);
    // срабатывает каждые 500ms

function scrollToBottom(){ 
    // Прокрутка документа до указанных координат.
    chatBox.scrollTop = chatBox.scrollHeight; 
    // Метод scrollTo() позволяет программно прокрутить элемент на определённое количество пикселей. 
  }
  