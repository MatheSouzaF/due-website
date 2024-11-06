export function updateRooms(cardTemplate, rooms, isStudio) {
  let roomsText = 'N/A';

  if (rooms && rooms.length > 0) {
    const numberOfRoomns = rooms.sort((a, b) => a - b).map((n) => parseInt(n, 10));

    if (numberOfRoomns.length === 1) {
      roomsText = `${isStudio ? 'Studio e ' : ''}${numberOfRoomns[0]} ${
        numberOfRoomns[0] === 1 ? 'quarto' : 'quartos'
      }`;
    } else if (numberOfRoomns.length === 2) {
      roomsText = `${isStudio ? 'Studio, ' : ''}${numberOfRoomns[0]} e ${numberOfRoomns[1]} quartos`;
    } else {
      const minRoom = numberOfRoomns[0];
      const maxRoom = numberOfRoomns[numberOfRoomns.length - 1];
      roomsText = `${isStudio ? 'Studio, ' : ''}${minRoom} a ${maxRoom} quartos`;
    }
  }

  $(cardTemplate).find('.info-quartos').text(roomsText);
}
