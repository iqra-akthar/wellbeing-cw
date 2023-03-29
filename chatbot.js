window.addEventListener('load', () => {
  const chatlog = document.querySelector('.chatlog');
  const input = document.querySelector('#input');
  const submit = document.querySelector('#submit');

  submit.addEventListener('click', () => {
    const message = input.value;
    input.value = '';
    addMessage('You', message);
    getResponse(message);
  });

  function addMessage(sender, message) {
    const div = document.createElement('div');
    div.innerHTML = `<strong>${sender}:</strong> ${message}`;
    chatlog.appendChild(div);
    chatlog.scrollTop = chatlog.scrollHeight;
  }

  function getResponse(message) {
    let response;

    // Check for keywords in the user's message and respond accordingly
    if (message.includes('sad')) {
      response = "I am sorry to hear that you are feeling sad. Is there anything you would like to talk about?";
    } else if (message.includes('suicidal')) {
      response = "If you are having thoughts of suicide, please call a suicide prevention hotline or seek help from a mental health professional immediately.";
    } else if (message.includes('unhappy')) {
      response = "I am sorry to hear that you are feeling unhappy. Would you like to talk about what is bothering you?";
    }
    else if (message.includes('anxious')) {
      response = "I am sorry to hear that you're anxious. Try call the samaritan helpine - ";
    }
    else if (message.includes('depressed')) {
      response = "I'm sorry to hear that you're feeling that way. It's important to seek help from a mental health professional. In the meantime, here are some self-care tips: try to get regular exercise, eat a healthy diet, and make sure you're getting enough sleep.";
    }
    else if (message.includes('happy')) {
      response = "It's good to hear you're feeling that way. Be sure to track your wellbeing and let us know how you are!";
    }
    else {
      response = "Hello:) I am you're wellbeing chatbot! How can I help?";
    }

    addMessage('Chatbot', response);
  } 

});
