// Ez a funkció POST kérést küld egy JSON API felé és JSON-t küld a body-ban
// A válasz kiértékelése után a szerver visszaküldött adatot feldolgozzuk.

async function postData(url, bodyData) {
  try {
    const response = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(bodyData)
    });

    if (!response.ok) throw new Error('HTTP hiba: ' + response.status);

    const data = await response.json();
    console.log('Szerver válasz:', data);

    return data;
  } catch (error) {
    console.error('Hálózati hiba:', error);
    return { success: false, message: error.message };
  }
}


async function getData(link) {
    try {
      const response = await fetch(link);
      if (!response.ok) throw new Error('HTTP hiba: ' + response.status);
  
      const data = await response.json();
      console.log('Szerver válasz:', data);
  
      if (Array.isArray(data)) {
        console.log('Adatok tömbként:', data);
      } else if (data.success) {
        console.log('Siker:', data.message);
      } else {
        console.warn('Hiba vagy ismeretlen formátum:', data);
      }
  
      return data;
  
    } catch (error) {
      console.error('Hiba történt:', error);
      return { success: false, message: error.message };
    }
  }
  