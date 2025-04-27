  //ajax login form
const form = document.querySelector(".login form"),
  // querySelector() Document метод querySelector() возвращает первый элемент ( Element ) документа, 
  // который соответствует указанному селектору или группе селекторов. 
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{ 
  // Событие onsubmit возникает при отправке формы, это обычно происходит, 
  // когда пользователь нажимает специальную кнопку Submit.
    e.preventDefault();
    // Метод preventDefault () интерфейса Event сообщает User agent,
    //  что если событие не обрабатывается явно, его действие по умолчанию не должно выполняться так, как обычно.
}

continueBtn.onclick = ()=>{ 
    // Событие onclick происходит, когда пользователь нажимает на элемент.
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "assets/php/login.php", true); 
    // Данные отправляются с помощью POST запроса 
    xhr.onload = ()=>{ 
    // Описание Событие onload используется как указатель,
    //  что веб-страница полностью загружена, включая содержание, изображения, стилевые файлы и внешние скрипты.
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){  
                //login php: echo "success";
                location.href = "index.php";
                //redirect при успешном email,password from BD
              }else{
                errorText.style.display = "block";
                errorText.textContent = data; 
                // textContent – это свойство, 
                // которое предназначено для работы с текстовым контентом элемента.
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);  
    //creating new FormData object, sending the form data to php
}