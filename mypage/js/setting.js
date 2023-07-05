  // 値の保存
  function saveValueToLocalStorage(sliderId, value) {
    localStorage.setItem(sliderId, value);
  }

  // 値の取得
  function getValueFromLocalStorage(sliderId) {
    return localStorage.getItem(sliderId);
  }

  // スライダーの表示と値の保存
  function display_value_slider(sliderId) {
    var slider = document.getElementById(sliderId);
    var valueDisplay = document.getElementById(sliderId + "Value");

    valueDisplay.textContent = slider.value;
    saveValueToLocalStorage(sliderId, slider.value);
  }

  // 初期値の表示と復元
  window.onload = function() {
    var sliderIds = ["slider01", "slider02"];
    for (var i = 0; i < sliderIds.length; i++) {
      var sliderId = sliderIds[i];
      var slider = document.getElementById(sliderId);
      var valueDisplay = document.getElementById(sliderId + "Value");
      var storedValue = getValueFromLocalStorage(sliderId);

      if (storedValue) {
        slider.value = storedValue;
      }
      
      valueDisplay.textContent = slider.value;
      saveValueToLocalStorage(sliderId, slider.value);
    }
  };