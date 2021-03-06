 <!-- Начало формы -->

      <form name="contactme" id="contactme" method="post" action="t.php">
        <p style="text-align: center; color: #333; font-size: 16px; font-weight: bold;">Напишите нам.</p>
        <div class="row">
          <div class="col-md-6">
            <input type="text" id="user" placeholder="Ваше имя" class="form-control" aria-describedby="basic-addon1" name="user" maxlength="120"
              required>
          </div>
          <div class="col-md-6">
            <input placeholder="Ваш E-mail" type="email" id="email" name="email" required class="form-control" aria-describedby="basic-addon1"
              maxlength="120">
          </div>
        </div>
        <br>
        <textarea id="message" name="message" required class="form-control" rows="4" maxlength="500"></textarea>
        <br/>
        <p style="text-align: center; padding: 0; margin: 0;">
          <input value="Отправить" type="submit" class="btn" id="sendForm" />
        </p>
        <br>
      </form>

      <script>
        jQuery.validator.setDefaults({
          debug: false,
          success: "valid"
        });
        $("#contactme").validate({
          rules: {
            email: {
              required: true,
              email: true
            },
            phone: {
              required: true
            },
            message: {
              required: true
            },
            capcode: {
              required: true
            },
          },
          messages: {
            user: "Пожалуйста укажите Ваше имя",
            phone: "Введите корректный номер телефона. Телефонный номер должен состоять минимум из 9 цифр.",
            message: "Введите сообщение (макс. 500 символов)",
            capcode: "Введите проверочный код с картинки",
            email: {
              required: "Нам нужен Ваш E-mail для обратной связи",
              email: "Введите E-mail в правильном формате (user@mail.box)"
            }
          },
          submitHandler: function (form) {
            form.submit();
          }
        });
      </script>


              <div class="medium-6 small-12" style="">
          <a href="">
            <img src="assets/img/1.png" class="room" alt="">
          </a>
        </div>
        <div class="medium-6 small-12" style="">
          <a href="">
            <img src="assets/img/2.png" class="room" alt="">
          </a>
        </div>