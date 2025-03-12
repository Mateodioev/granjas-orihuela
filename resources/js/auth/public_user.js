async function getUser(dni) {
    const url = route("user.findByDni", dni);

    return (await axios.get(url)).data;
}

export { getUser };
