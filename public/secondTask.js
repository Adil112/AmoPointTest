function filterFields() {
    let selectedValue = document.getElementsByName("type_val")[0].value;
    let paragraphs = document.getElementsByTagName("p");

    for (let i = 0; i < paragraphs.length; i++) {
        let p = paragraphs[i];
        let input = p.querySelector("input");
        if (!input) continue;
        let name = input.getAttribute("name");
        if (name.includes(selectedValue)) {
            p.style.display = "block";
        } else {
            p.style.display = "none";
        }
    }
}
filterFields();
document.getElementsByName("type_val")[0].onchange = filterFields;



//Решения аналоги

//1. Использование jQuery или других библиотек
//Учитывая задачу и ее размер, я посчитал что это избыточно хоть он уже подключен. Также нативный js работает быстрее.

//2. Через css | Через мапу
//Можно было при изменении поля Тип менять класс всей формы, а в css прописать что надо скрыть тот и тот элемент. Или сделать такое же соответствие в мапу.
//Но для этого надо подключать другой файл, и это не универсально как обычный js. Если появиться новый элемент, то надо лезть внутрь кода и менять.
