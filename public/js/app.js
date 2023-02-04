const btnMessage = document.getElementById("btn-messages"),
  messageBox = document.getElementById("messages-box")
  btnUserOptionClose = document.getElementById("btn-messages-close")
  showUserOption = document.querySelectorAll(".show-user-option")
  usersLists = document.getElementById("users-list"),
  showPostOptions = document.querySelectorAll(".showPostOptions"),
  postOption = document.getElementById("post-option")

btnMessage.addEventListener("click", () => {
  usersLists.classList.toggle("hidden");
});


btnUserOptionClose.addEventListener("click",() => {
  usersLists.classList.add("hidden")
})


Array.from(showUserOption).forEach(b => {
  showPopUpMenu(b)
})

Array.from(showPostOptions).forEach(b => {
  showPopUpMenu(b)
})


function showPopUpMenu(event)
{
  event.addEventListener("click", (e) => {
    let btn = e.target.parentElement
    let ulOption = btn.parentElement

    ulOption.querySelector("ul").classList.toggle("hidden")
  })
}